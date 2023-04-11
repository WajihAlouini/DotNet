import { pool } from "../db.js";

export const renderIptvs = async (req, res) => {
  const [rows] = await pool.query("SELECT * FROM iptv");
  const [rows2] = await pool.query("SELECT * from fournisseur");
  const [rows3] = await pool.query("SELECT * from chaine");

  res.render("iptv", { iptv: rows, fournisseur: rows2, chaine: rows3 });
};

export const createIptvs = async (req, res) => {
  const newIptv = req.body;
  await pool.query("INSERT INTO iptv set ?", [newIptv]);
  res.redirect("/admin");
};

export const editIptvs = async (req, res) => {
  const { id } = req.params;
  const [result] = await pool.query("SELECT * FROM iptv WHERE id_iptv = ?", [
    id
  ]);
  res.render("iptv_edit", { iptv: result[0] });
};

export const updateIptvs = async (req, res) => {
  const { id } = req.params;
  const newIptv = req.body;
  await pool.query("UPDATE iptv set ? WHERE id_iptv = ?", [newIptv, id]);
  res.redirect("/admin");
};

export const deleteIptvs = async (req, res) => {
  const { id } = req.params;
  const result = await pool.query("DELETE FROM iptv WHERE id_iptv = ?", [id]);
  if (result.affectedRows === 1) {
    res.json({ message: "Iptv deleted" });
  }
  res.redirect("/admin");
};
