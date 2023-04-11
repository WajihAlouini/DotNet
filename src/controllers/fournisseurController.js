import { pool } from "../db.js";

export const renderFournisseurs = async (req, res) => {
  const [rows] = await pool.query("SELECT * FROM fournisseur");
  res.render("fournisseur", { fournisseur: rows });
};

export const createFournisseurs = async (req, res) => {
  const newFournisseur = req.body;
  await pool.query("INSERT INTO fournisseur set ?", [newFournisseur]);
  res.redirect("/admin");
};

export const editFournisseurs = async (req, res) => {
  const { id } = req.params;
  const [result] = await pool.query("SELECT * FROM fournisseur WHERE id_fournisseur = ?", [
    id
  ]);
  res.render("fournisseur_edit", { fournisseur: result[0] });
};

export const updateFournisseurs = async (req, res) => {
  const { id } = req.params;
  const newFournisseur = req.body;
  await pool.query("UPDATE fournisseur set ? WHERE id_fournisseur = ?", [newFournisseur, id]);
  res.redirect("/admin");
};

export const deleteFournisseurs = async (req, res) => {
  const { id } = req.params;
  const result = await pool.query("DELETE FROM fournisseur WHERE id_fournisseur = ?", [id]);
  if (result.affectedRows === 1) {
    res.json({ message: "fournisseur deleted" });
  }
  res.redirect("/admin");
};
