import { pool } from "../db.js";

export const renderMain = async (req, res) => {
  const [rows] = await pool.query("SELECT * FROM iptv");
  const [rows2] = await pool.query("SELECT * from fournisseur");
  const [rows3] = await pool.query("SELECT * from chaine");
  res.render("main", { iptv: rows, fournisseur: rows2, chaine: rows3 });
};
 
export const renderChannels = async (req, res) => {
  const [rows] = await pool.query("SELECT * FROM iptv");
  const [rows2] = await pool.query("SELECT * from fournisseur");
  const [rows3] = await pool.query("SELECT * from chaine");
  res.render("channels", { iptv: rows, fournisseur: rows2, chaine: rows3 });
};