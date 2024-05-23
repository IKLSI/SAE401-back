CREATE OR REPLACE FUNCTION update_moyenne_comp()
RETURNS TRIGGER AS $$
DECLARE
    comp_rec RECORD;
    coef_tot float;
BEGIN
    -- Parcourir tous les coefficients liés au module modifié
    FOR comp_rec IN
        SELECT DISTINCT C.id_comp
        FROM Coefficient C 
        WHERE id_coef = NEW.id_coef
    LOOP
        -- Récupérer le total des coefficients
        SELECT SUM(coef) INTO coef_tot
        FROM Coefficient
        WHERE id_comp = comp_rec.id_comp;

        UPDATE EtuComp
        SET moyenne_comp = (
            SELECT SUM(note * coef) / coef_tot
            FROM EtuModule EM
            INNER JOIN Coefficient C ON EM.id_coef = C.id_coef
            WHERE EM.id_etu = NEW.id_etu
            AND C.id_comp = comp_rec.id_comp
        ) + bonus
        WHERE id_etu = NEW.id_etu
        AND id_comp = comp_rec.id_comp;
    END LOOP;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE TRIGGER trigger_module_moy
AFTER UPDATE OF note ON EtuModule
FOR EACH ROW
EXECUTE FUNCTION update_moyenne_comp();

CREATE OR REPLACE FUNCTION update_moyenne_semestre()
RETURNS TRIGGER AS $$
BEGIN
    -- Mettre à jour la moyenne du semestre si la moyenne de compétence change
    UPDATE EtuSemestre
    SET moyenne = (
        SELECT AVG(moyenne_comp)
        FROM EtuComp
        WHERE id_etu = NEW.id_etu
        AND id_semestre = (
            SELECT id_semestre
            FROM Competence
            WHERE id_comp = NEW.id_comp
        )
    )
    WHERE id_etu = NEW.id_etu
    AND id_semestre = (
        SELECT id_semestre
        FROM Competence
        WHERE id_comp = NEW.id_comp
    );

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE TRIGGER trigger_comp_moy
AFTER UPDATE OF moyenne_comp ON EtuComp
FOR EACH ROW
EXECUTE FUNCTION update_moyenne_semestre();

CREATE OR REPLACE FUNCTION update_bonus_comp()
RETURNS TRIGGER AS $$
BEGIN
    -- Mettre à jour la compétence si le bonus change
    UPDATE EtuComp
    SET moyenne_comp = moyenne_comp + NEW.bonus - bonus
    WHERE id_etu = NEW.id_etu
    AND id_comp = NEW.id_comp;

    RETURN NEW;
END;
$$ LANGUAGE plpgsql;

CREATE OR REPLACE TRIGGER trigger_bonus_comp
AFTER UPDATE OF bonus ON EtuComp
FOR EACH ROW
EXECUTE FUNCTION update_bonus_comp();