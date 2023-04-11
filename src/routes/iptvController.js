import { Router } from "express";
import {
  createIptvs,
  deleteIptvs,
  editIptvs,
  renderIptvs,
  updateIptvs,
} from "../controllers/iptvController.js";
import {
  createFournisseurs,
  deleteFournisseurs,
  editFournisseurs,
  renderFournisseurs,
  updateFournisseurs,
} from "../controllers/fournisseurController.js";
import {
  createChaines,
  deleteChaines,
  editChaines,
  renderChaines,
  updateChaines,
} from "../controllers/chaineController.js";
import {
  renderMain,
  renderChannels,
} from "../controllers/mainController.js";
const router = Router();
router.get("/",renderMain);
router.get("/channels",renderChannels);
//iptv
router.get("/admin", renderIptvs);
router.post("/add", createIptvs);
router.get("/update/:id", editIptvs);
router.post("/update/:id", updateIptvs);
router.get("/delete/:id", deleteIptvs);
//fournisseur
router.post("/addFournisseur", createFournisseurs);
router.get("/updateFournisseur/:id", editFournisseurs);
router.post("/updateFournisseur/:id", updateFournisseurs);
router.get("/deleteFournisseur/:id", deleteFournisseurs);
//chaine
router.post("/addChaine", createChaines);
router.get("/updateChaine/:id", editChaines);
router.post("/updateChaine/:id", updateChaines);
router.get("/deleteChaine/:id", deleteChaines);

export default router;
