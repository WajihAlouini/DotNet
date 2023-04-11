import { pool } from "../db.js";

export const renderChaines = async (req, res) => {
  const [rows] = await pool.query("SELECT * FROM chaine");
  res.render("chaine", { chaine: rows });
};

export const createChaines = async (req, res) => {
  const newChaine = req.body;
  await pool.query("INSERT INTO chaine set ?", [newChaine]);
  res.redirect("/admin");
};

export const editChaines = async (req, res) => {
  const { id } = req.params;
  const [result] = await pool.query("SELECT * FROM chaine WHERE id_chaine = ?", [
    id
  ]);
  res.render("chaine_edit", { chaine: result[0] });
};

export const updateChaines = async (req, res) => {
  const { id } = req.params;
  const newChaine = req.body;
  await pool.query("UPDATE chaine set ? WHERE id_chaine = ?", [newChaine, id]);
  res.redirect("/admin");
};

export const deleteChaines = async (req, res) => {
  const { id } = req.params;
  const result = await pool.query("DELETE FROM chaine WHERE id_chaine = ?", [id]);
  if (result.affectedRows === 1) {
    res.json({ message: "chaine deleted" });
  }
  res.redirect("/admin");
};
