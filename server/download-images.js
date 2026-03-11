const axios = require('axios');
const fs = require('fs');
const path = require('path');

const SAVE_DIR = path.join(__dirname, 'public', 'images', 'products');
const BASE_URL = 'https://www.dxnarabia.com/product/images/bh/';

const PRODUCTS = [
  { filename: 'FB369_Ootea_Lingzhi_Coffee_Mix_3in1.jpg' },
  { filename: 'FB370_Ootea_Lingzhi_Coffee_Mix_3in1_LITE.jpg' },
  { filename: 'FB371_Ootea_Lingzhi_Coffee_Mix_2in1.jpg' },
  { filename: 'FB372_Ootea_Cordyceps_Coffee_Mix.jpg' },
  { filename: 'FB373_Ootea_ZhiMocha_Mix.jpg' },
  { filename: 'FB374_Ootea_WhiteCoffeeZhino_Mix.jpg' },
  { filename: 'FB375_Ootea_Lingzhi_Black_Coffee_Mix.jpg' },
  { filename: 'FB376_Ootea_Vita_Cafe_Mix.jpg' },
  { filename: 'FB377_Ootea_Eu_Cafe_Mix.jpg' },
  { filename: 'LC20_LingzhiCoffee3in1.jpg' },
  { filename: 'LBC_LingzhiBlackCoffee.jpg' },
  { filename: 'FB066_LingzhiCoffee3in1Lite.jpg' },
  { filename: 'FB129_CordycepsCoffee3in1.jpg' },
  { filename: 'FB130_CreamCoffee.jpg' },
  { filename: 'FB173_Spirudle.jpg' },
  { filename: 'FB360_Sugar.jpg' },
  { filename: 'FB033_GanoPineappleMix.jpg' },
  { filename: 'FB143_ZhiMintPlus.jpg' },
  { filename: 'FB005_Roselle285m.jpg' },
  { filename: 'MOR_Morinzhi285mI.jpg' },
  { filename: 'FB065_Morinzhi700ml.jpg' },
  { filename: 'COCO_Cocozhi.jpg' },
  { filename: 'FB032_SpirulinaCereal.jpg' },
  { filename: 'FB050_Vinaigrette700ml.jpg' },
  { filename: 'CORPIN_Cordypine285ml.jpg' },
  { filename: 'FB155_Lemonzhi.jpg' },
  { filename: 'FB301_LingzhiTeaLatte.jpg' },
  { filename: 'LION_LionMane120.jpg' },
  { filename: 'CORDY_Cordyceps120.jpg' },
  { filename: 'RGLP70_ReishiMushroomPowder70g.jpg' },
  { filename: 'SPI120_Spirulina120.jpg' },
  { filename: 'SPI500_Spirulina500.jpg' },
  { filename: 'HF082_BeePollenGranule40g.jpg' },
  { filename: 'MYCO_Mycoveggie.jpg' },
  { filename: 'HF044_Potenzhi90.jpg' },
  { filename: 'HS250_Shampoo.jpg' },
  { filename: 'BL250_BodyFoam.jpg' },
  { filename: 'GTP_ToothPaste150g.jpg' },
  { filename: 'OIL_MassageOil.jpg' },
  { filename: 'POW_TalcumPowder.jpg' },
  { filename: 'PC020_GP_Toothpaste150g.jpg' },
  { filename: 'PC039_GP_Shampoo.jpg' },
  { filename: 'PC041_Adult_Toothbrush_Group.jpg' },
  { filename: 'PC042_Children_Toothbrush_Group.jpg' },
  { filename: 'PC045_Zhimeko.jpg' },
  { filename: 'PC074_Oocha_Trans_Soap.jpg' },
  { filename: 'PC120_Ganozhi_Soap_80G.jpg' },
  { filename: 'TTC-TeaTreeCream.jpg' },
  { filename: 'SC010_Toner.jpg' },
  { filename: 'SC011_MositurizingEmulsion.jpg' },
  { filename: 'SC009_LiquidCleanser.jpg' },
  { filename: 'SC012_ChubbyBabyOil.jpg' },
  { filename: 'SC014_CocoRed.jpg' },
  { filename: 'SC015_PearlyRed.jpg' },
  { filename: 'SC016_PearlyPink.jpg' },
  { filename: 'SC017_PearlyGrape.jpg' },
  { filename: 'SC020_CleansingGel.jpg' },
  { filename: 'SC021_HydratingToner.jpg' },
  { filename: 'SC022_AquaGel.jpg' },
  { filename: 'SC023_NutricareCream.jpg' },
  { filename: 'SC024_Hand&BodyLotion.jpg' },
  { filename: 'SC073_Chubby_Baby_Oil_40ml.jpg' },
];

async function download(filename) {
  const url = BASE_URL + filename;
  const dest = path.join(SAVE_DIR, filename);
  try {
    const res = await axios.get(url, {
      responseType: 'arraybuffer',
      timeout: 20000,
      headers: { 'User-Agent': 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36' }
    });
    const buf = Buffer.from(res.data);
    const isJpeg = buf[0] === 0xFF && buf[1] === 0xD8;
    const isPng  = buf[0] === 0x89 && buf[1] === 0x50;
    if (!isJpeg && !isPng) { console.log(`  SKIP (not image): ${filename}`); return false; }
    fs.writeFileSync(dest, buf);
    console.log(`  OK  ${filename} (${(buf.length/1024).toFixed(0)}KB)`);
    return true;
  } catch (e) {
    console.log(`  ERR ${filename}: ${e.message}`);
    return false;
  }
}

async function run() {
  if (!fs.existsSync(SAVE_DIR)) fs.mkdirSync(SAVE_DIR, { recursive: true });
  console.log(`Downloading ${PRODUCTS.length} images to ${SAVE_DIR}\n`);
  let ok = 0, fail = 0;
  for (const { filename } of PRODUCTS) {
    if (await download(filename)) ok++; else fail++;
  }
  console.log(`\nDone: ${ok} downloaded, ${fail} failed.`);
}

run();
