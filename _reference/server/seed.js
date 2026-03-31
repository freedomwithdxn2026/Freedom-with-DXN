const mongoose = require('mongoose');
const dotenv = require('dotenv');
dotenv.config();

const Product = require('./models/Product');

const IMG = '/images/products/';

const products = [
  // ── COFFEE ──────────────────────────────────────────────────────────────────
  {
    name: 'DXN Ootea Lingzhi Coffee Mix 3 in 1', sku: 'FB369', category: 'coffee',
    price: 24.99, rating: 4.8, featured: true, inStock: true,
    image: IMG + 'FB369_Ootea_Lingzhi_Coffee_Mix_3in1.jpg',
    description: 'Combines high-quality coffee beans, premium oolong tea powder, and the added benefits of Ganoderma with balanced proportions of sugar and creamer. Packaged as 21g x 20 stick packs.',
    benefits: ['Ganoderma + Oolong tea blend', 'Convenient stick packs', 'Balanced sugar and creamer', 'No artificial preservatives'],
  },
  {
    name: 'DXN Ootea Lingzhi Coffee Mix 3 in 1 Lite', sku: 'FB370', category: 'coffee',
    price: 23.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'FB370_Ootea_Lingzhi_Coffee_Mix_3in1_LITE.jpg',
    description: 'Combines high-quality coffee beans, premium oolong tea powder, and Ganoderma for a milder taste. Designed to calm nerves while satisfying cravings. 20 sachets x 21g each.',
    benefits: ['Milder, calming taste', 'Oolong tea + Ganoderma', 'Less bitter formula', 'Convenient sachets'],
  },
  {
    name: 'DXN Ootea Lingzhi Coffee Mix 2 in 1', sku: 'FB371', category: 'coffee',
    price: 22.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'FB371_Ootea_Lingzhi_Coffee_Mix_2in1.jpg',
    description: 'Blends high-quality coffee beans, premium oolong tea powder and Ganoderma in a pre-sweetened formula. Each box contains 20 sachets x 11g each.',
    benefits: ['Sugar-free option', 'Oolong tea blend', 'Ganoderma enriched', 'Lightweight sachets'],
  },
  {
    name: 'DXN Ootea Cordyceps Coffee Mix 3 in 1', sku: 'FB372', category: 'coffee',
    price: 25.99, rating: 4.7, featured: false, inStock: true,
    image: IMG + 'FB372_Ootea_Cordyceps_Coffee_Mix.jpg',
    description: 'Combines high-quality coffee beans, premium oolong tea powder with cordyceps mushroom extract for an energizing drink. 20 stick packs x 21g each.',
    benefits: ['Cordyceps for energy', 'Oolong tea blend', 'Energizing formula', 'Premium coffee beans'],
  },
  {
    name: 'DXN Ootea Zhi Mocha Mix', sku: 'FB373', category: 'coffee',
    price: 24.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'FB373_Ootea_ZhiMocha_Mix.jpg',
    description: 'Blends coffee beans, premium oolong tea powder, cocoa powder and Ganoderma for unique bursts of coffee, tea and cocoa flavours. 20 stick packs x 21g.',
    benefits: ['Coffee + Tea + Cocoa', 'Rich mocha flavour', 'Ganoderma enriched', 'Unique flavour profile'],
  },
  {
    name: 'DXN Ootea White Coffee Zhino Mix', sku: 'FB374', category: 'coffee',
    price: 26.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'FB374_Ootea_WhiteCoffeeZhino_Mix.jpg',
    description: 'Combines high-quality coffee beans, premium oolong tea powder, and Ganoderma for a smooth, mild taste. 12 sachets x 28g each.',
    benefits: ['Smooth mild taste', 'White coffee blend', 'Oolong tea + Ganoderma', 'Rich aroma'],
  },
  {
    name: 'DXN Ootea Lingzhi Black Coffee Mix', sku: 'FB375', category: 'coffee',
    price: 21.99, rating: 4.7, featured: false, inStock: true,
    image: IMG + 'FB375_Ootea_Lingzhi_Black_Coffee_Mix.jpg',
    description: 'Combines high-quality coffee beans, premium oolong tea powder, and Ganoderma with no added sugar. 20 sachets x 4.5g each.',
    benefits: ['Zero sugar formula', 'Bold coffee taste', 'Ganoderma + Oolong', 'Pure black coffee'],
  },
  {
    name: 'DXN Ootea Vita Cafe Mix', sku: 'FB376', category: 'coffee',
    price: 27.99, rating: 4.7, featured: false, inStock: true,
    image: IMG + 'FB376_Ootea_Vita_Cafe_Mix.jpg',
    description: 'Combines coffee beans, oolong tea powder, Ganoderma, Tongkat Ali and Ginseng to provide energy throughout the day. 20 stick packs x 21g each.',
    benefits: ['Tongkat Ali + Ginseng', 'All-day energy boost', 'Ganoderma + Oolong', 'Multi-herb blend'],
  },
  {
    name: 'DXN Lingzhi Coffee 3 in 1', sku: 'FB002', category: 'coffee',
    price: 24.99, rating: 4.8, featured: true, inStock: true,
    image: IMG + 'LC20_LingzhiCoffee3in1.jpg',
    description: 'A complete cup of smooth and delicious coffee combining premium coffee beans with pure Lingzhi (reishi mushroom). No artificial colorings, flavorings, or preservatives. 20 sticks x 21g.',
    benefits: ['Classic Lingzhi Coffee', 'No artificial additives', 'Smooth rich taste', 'Immune support'],
  },
  {
    name: 'DXN Lingzhi Black Coffee', sku: 'FB054', category: 'coffee',
    price: 21.99, rating: 4.7, featured: false, inStock: true,
    image: IMG + 'LBC_LingzhiBlackCoffee.jpg',
    description: 'Sugar-free formulation that retains the bold taste and rich aroma of traditional coffee with Lingzhi. 20 sachets x 4.5g each.',
    benefits: ['Zero sugar', 'Bold coffee aroma', 'Lingzhi enriched', 'Pure coffee taste'],
  },
  {
    name: 'DXN Lingzhi Coffee 3 in 1 Lite', sku: 'FB066', category: 'coffee',
    price: 23.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'FB066_LingzhiCoffee3in1Lite.jpg',
    description: 'A lighter variant of Lingzhi Coffee offering a creamy taste profile with smooth, full-bodied experience and irresistible aroma. 20 sticks x 21g each.',
    benefits: ['Lighter formula', 'Full-bodied aroma', 'Ganoderma benefits', 'Perfect daily coffee'],
  },
  {
    name: 'DXN Cordyceps Coffee 3 in 1', sku: 'FB129', category: 'coffee',
    price: 25.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'FB129_CordycepsCoffee3in1.jpg',
    description: 'Specially formulated from instant coffee powder with Cordyceps extract. A smooth and aromatic coffee to zest up your day. 20 sticks x 21g each.',
    benefits: ['Cordyceps energy boost', 'Smooth aromatic blend', 'Instant coffee format', 'Zestful flavour'],
  },
  {
    name: 'DXN Cream Coffee', sku: 'FB130', category: 'coffee',
    price: 22.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'FB130_CreamCoffee.jpg',
    description: 'A blend of instant coffee powder, Ganoderma extract, and non-dairy creamer. Sugar-free with rich aroma and silky smooth texture. 20 sachets x 14g each.',
    benefits: ['Sugar-free creamy coffee', 'Non-dairy creamer', 'Ganoderma enriched', 'Silky smooth texture'],
  },

  // ── BEVERAGES ────────────────────────────────────────────────────────────────
  {
    name: 'DXN Cocozhi', sku: 'FB025', category: 'beverages',
    price: 22.99, rating: 4.5, featured: true, inStock: true,
    image: IMG + 'COCO_Cocozhi.jpg',
    description: 'Formulated from premium cocoa combined with Ganoderma extract. A ready-to-drink powdered form giving a rich chocolate taste when mixed with hot water. 20 sachets x 32g.',
    benefits: ['Rich chocolate taste', 'Ganoderma enriched', 'Great for all ages', 'Healthy cocoa alternative'],
  },
  {
    name: 'DXN Morinzhi 285ml', sku: 'FB007', category: 'beverages',
    price: 18.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'MOR_Morinzhi285mI.jpg',
    description: 'Specially formulated from Morinda citrifolia (Noni) enriched with Roselle. Noni has been traditionally used among the folks in the South Pacific region. 285ml bottle.',
    benefits: ['Noni fruit extract', 'Roselle enriched', 'Powerful antioxidant', 'Traditional wellness tonic'],
  },
  {
    name: 'DXN Morinzhi 700ml', sku: 'FB065', category: 'beverages',
    price: 38.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'FB065_Morinzhi700ml.jpg',
    description: 'Specially formulated from Morinda citrifolia (Noni) enriched with Roselle. A powerful antioxidant health tonic in a larger 700ml bottle.',
    benefits: ['Noni + Roselle blend', 'Large 700ml size', 'Traditional recipe', 'Antioxidant-rich'],
  },
  {
    name: 'DXN Roselle Juice', sku: 'FB005', category: 'beverages',
    price: 15.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'FB005_Roselle285m.jpg',
    description: 'A refreshing beverage formulated from Roselle calyces extract. Suitable for all. Also ideal for making ice cream, jam and jelly. 285ml bottle.',
    benefits: ['Pure Roselle extract', 'Rich in Vitamin C', 'Refreshing taste', 'Versatile ingredient'],
  },
  {
    name: 'DXN Cordypine', sku: 'FB053', category: 'beverages',
    price: 16.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'CORPIN_Cordypine285ml.jpg',
    description: 'Blends quality cordyceps and naturally fermented pineapple juice. A unique health beverage combining two powerful natural ingredients. 285ml.',
    benefits: ['Cordyceps + Pineapple', 'Naturally fermented', 'Energy boosting', 'Unique health blend'],
  },
  {
    name: 'DXN Lemonzhi', sku: 'FB155', category: 'beverages',
    price: 19.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'FB155_Lemonzhi.jpg',
    description: 'A healthy and refreshingly delicious beverage combining lemon with tea powder and Ganoderma extract. 20 sachets x 22g each.',
    benefits: ['Lemon + Ganoderma', 'Refreshing taste', 'Tea-based formula', 'Great for any time of day'],
  },
  {
    name: 'DXN Lingzhi Tea Latte', sku: 'FB301', category: 'beverages',
    price: 21.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'FB301_LingzhiTeaLatte.jpg',
    description: 'Combines premium tea powder with non-dairy creamer and Ganoderma extract for a strong but less bitter taste. Boosts energy with distinctive aroma. 12 sachets x 30g.',
    benefits: ['Tea latte formula', 'Non-dairy creamer', 'Ganoderma + energy', 'Less bitter taste'],
  },
  {
    name: 'DXN Spirulina Cereal', sku: 'FB032', category: 'beverages',
    price: 24.99, rating: 4.3, featured: false, inStock: true,
    image: IMG + 'FB032_SpirulinaCereal.jpg',
    description: 'Combines high quality cereals and spirulina powder for a nutritious, high-fiber breakfast option. 30 sachets x 30g each.',
    benefits: ['High-fiber breakfast', 'Spirulina enriched', 'Nutritious cereal blend', 'Quick and convenient'],
  },
  {
    name: 'DXN Vinaigrette', sku: 'FB050', category: 'beverages',
    price: 25.99, rating: 4.3, featured: false, inStock: true,
    image: IMG + 'FB050_Vinaigrette700ml.jpg',
    description: 'Crafted from selected rice vinegar combined with Ganoderma lucidum. Years-long fermentation process using traditional techniques. 700ml bottle.',
    benefits: ['Traditional fermentation', 'Ganoderma rice vinegar', 'Rich in enzymes', 'Supports digestion'],
  },
  {
    name: 'DXN Zhi Mint Plus', sku: 'FB143', category: 'beverages',
    price: 14.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'FB143_ZhiMintPlus.jpg',
    description: 'Addresses throat irritation and bad breath with icy cool and soothing relief and a mild mint flavor. 12 sachets x 25g each.',
    benefits: ['Soothes throat', 'Freshens breath', 'Cool mint flavour', 'Portable handy pack'],
  },
  {
    name: 'Gano Pineapple Mix', sku: 'FB033', category: 'beverages',
    price: 18.99, rating: 4.3, featured: false, inStock: true,
    image: IMG + 'FB033_GanoPineappleMix.jpg',
    description: 'A distinctive pineapple jam combining Ganoderma mycelium with 100% pure pineapple. Versatile as a spread or baking filling. Net weight 440g per bottle.',
    benefits: ['100% pure pineapple', 'Ganoderma mycelium', 'Tropical fruit flavour', 'Versatile food ingredient'],
  },
  {
    name: 'DXN Spirudle', sku: 'FB173', category: 'beverages',
    price: 12.99, rating: 4.2, featured: false, inStock: true,
    image: IMG + 'FB173_Spirudle.jpg',
    description: 'Healthy instant noodles with no artificial coloring, oil-free drying process, spirulina addition, and authentic Tom Yam flavor.',
    benefits: ['Oil-free drying process', 'No artificial coloring', 'Spirulina added', 'Tom Yam flavour'],
  },
  {
    name: 'DXN Sugar Sachets', sku: 'FB360', category: 'beverages',
    price: 9.99, rating: 4.1, featured: false, inStock: true,
    image: IMG + 'FB360_Sugar.jpg',
    description: 'Granulated cane sugar in individually wrapped paper-coated foil sachets. Perfectly balanced flavor for hot beverages. 30 sachets x 5g.',
    benefits: ['Pure cane sugar', 'Individually wrapped', 'Perfect for beverages', 'Convenient portions'],
  },

  // ── SUPPLEMENTS ─────────────────────────────────────────────────────────────
  {
    name: 'DXN Lion\'s Mane Tablet', sku: 'HF029', category: 'supplements',
    price: 35.99, rating: 4.7, featured: true, inStock: true,
    image: IMG + 'LION_LionMane120.jpg',
    description: 'Contains Hericium erinaceus (Lion\'s Mane) extract. Cultivated under stringent quality control at DXN facilities. Supports brain function and cognitive health. 300mg x 120 tablets.',
    benefits: ['Supports brain function', 'Enhances memory', 'Nerve growth support', 'Cognitive health'],
  },
  {
    name: 'DXN Cordyceps Tablet', sku: 'HF030', category: 'supplements',
    price: 39.99, rating: 4.8, featured: false, inStock: true,
    image: IMG + 'CORDY_Cordyceps120.jpg',
    description: 'Formulated from Cordyceps sinensis, a precious mushroom found naturally in the highlands of China, Tibet and Nepal. Boosts energy, stamina and respiratory health. 300mg x 120 tablets.',
    benefits: ['Boosts energy & stamina', 'Supports respiratory health', 'Athletic performance', 'Traditional remedy'],
  },
  {
    name: 'Reishi Mushroom Powder', sku: 'HF041', category: 'supplements',
    price: 42.99, rating: 4.7, featured: false, inStock: true,
    image: IMG + 'RGLP70_ReishiMushroomPowder70g.jpg',
    description: 'A balanced mixture of Ganoderma lucidum fruit body and its mycelium. Detoxes and rejuvenates the body on a cellular level. 70g packaging.',
    benefits: ['Pure Ganoderma powder', 'Cellular rejuvenation', 'Easy to mix', 'King of Herbs'],
  },
  {
    name: 'DXN Spirulina 120 Tablets', sku: 'HF031', category: 'supplements',
    price: 29.99, rating: 4.6, featured: true, inStock: true,
    image: IMG + 'SPI120_Spirulina120.jpg',
    description: 'Blue-green algae (spirulina) cultivated in clean ponds without pesticides or herbicides. Complete protein and nutrient source. 250mg x 120 tablets.',
    benefits: ['Complete protein source', 'Rich in vitamins & minerals', 'Pesticide-free', 'Alkaline superfood'],
  },
  {
    name: 'DXN Spirulina 500 Tablets', sku: 'HF038', category: 'supplements',
    price: 89.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'SPI500_Spirulina500.jpg',
    description: 'DXN was the first direct selling company in Malaysia to produce Spirulina from cultivation to finished goods. 500 tablets — best value pack.',
    benefits: ['500-tablet value pack', 'From cultivation to finish', 'Complete amino acids', 'Boosts immunity'],
  },
  {
    name: 'DXN Bee Pollen Granule', sku: 'HF082', category: 'supplements',
    price: 27.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'HF082_BeePollenGranule40g.jpg',
    description: 'Natural bee pollen granules collected from various plants and flowers. No chemical additives and preservatives. GMP-certified facility. 40g packaging.',
    benefits: ['Natural superfood', 'Rich in B vitamins', 'GMP certified', 'No additives'],
  },
  {
    name: 'DXN MycoVeggie', sku: 'HF039', category: 'supplements',
    price: 34.99, rating: 4.8, featured: false, inStock: true,
    image: IMG + 'MYCO_Mycoveggie.jpg',
    description: 'High soluble and insoluble fiber supplement. Low fat, sugar-free, no cholesterol. Contains psyllium husk, celery, mulberry, spirulina, green tea, shiitake, lion\'s mane and more.',
    benefits: ['High dietary fiber', 'Sugar-free formula', 'Multi-mushroom blend', 'Supports digestion'],
  },
  {
    name: 'DXN Potenzhi 90', sku: 'HF044', category: 'supplements',
    price: 45.99, rating: 4.7, featured: false, inStock: true,
    image: IMG + 'HF044_Potenzhi90.jpg',
    description: 'Formulated with 9 pure herb extracts including Tongkat Ali, Butea superba, Ganoderma, Cordyceps, black pepper, celery, green tea, lalang root and kayu secang stem.',
    benefits: ['9 herb extracts', 'Tongkat Ali + Ganoderma', 'Supports male vitality', 'Traditional herbal blend'],
  },

  // ── PERSONAL CARE ────────────────────────────────────────────────────────────
  {
    name: 'Ganozhi Shampoo', sku: 'PC004', category: 'personal-care',
    price: 16.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'HS250_Shampoo.jpg',
    description: 'Specialized shampoo featuring Ganoderma extract combined with vitamin B5. Refreshes hair and leaves it glossy soft. pH-balanced formula suitable for all hair types.',
    benefits: ['Ganoderma + Vitamin B5', 'pH-balanced', 'Glossy soft hair', 'All hair types'],
  },
  {
    name: 'Ganozhi Body Foam', sku: 'PC005', category: 'personal-care',
    price: 14.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'BL250_BodyFoam.jpg',
    description: 'Mild cleansing body foam enriched with Ganoderma extract. Lathers up to leave skin feeling clean without removing the skin\'s natural oil. Suitable for all skin types.',
    benefits: ['Ganoderma enriched', 'Preserves natural oils', 'Rich lather', 'All skin types'],
  },
  {
    name: 'Ganozhi Toothpaste', sku: 'PC006', category: 'personal-care',
    price: 12.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'GTP_ToothPaste150g.jpg',
    description: 'Contains Ganoderma extract, food gel, menthol and food flavoring. Free from saccharin and artificial coloring. Cleanses teeth and delivers a refreshing sensation.',
    benefits: ['Ganoderma + Menthol', 'No saccharin', 'Freshens breath', 'Whitens teeth'],
  },
  {
    name: 'Gano Massage Oil', sku: 'PC007', category: 'personal-care',
    price: 19.99, rating: 4.7, featured: false, inStock: true,
    image: IMG + 'OIL_MassageOil.jpg',
    description: 'A sensual blend combining premium palm oil with Ganoderma extract. All-natural formulation to soothe your body. Suitable for all skin types.',
    benefits: ['Ganoderma + Palm oil', 'Soothes tired muscles', 'All-natural formula', 'All skin types'],
  },
  {
    name: 'Talcum Powder', sku: 'PC015', category: 'personal-care',
    price: 8.99, rating: 4.2, featured: false, inStock: true,
    image: IMG + 'POW_TalcumPowder.jpg',
    description: 'Gives a smooth and comfortable feeling all day long with a pleasant fragrance that provides confidence wherever you are.',
    benefits: ['All-day freshness', 'Pleasant fragrance', 'Smooth comfortable feel', 'Confidence boost'],
  },
  {
    name: 'Ganozhi Plus Toothpaste', sku: 'PC020', category: 'personal-care',
    price: 14.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'PC020_GP_Toothpaste150g.jpg',
    description: 'Contains Ganoderma extract and xylitol. Free from artificial colouring, SLES, SLS and Paraben. Effectively cleans teeth and refreshes breath with minty flavor.',
    benefits: ['Ganoderma + Xylitol', 'SLS & Paraben free', 'Minty fresh breath', 'Advanced formula'],
  },
  {
    name: 'Ganozhi Plus Shampoo', sku: 'PC039', category: 'personal-care',
    price: 18.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'PC039_GP_Shampoo.jpg',
    description: 'Enhanced hair shampoo with Ganoderma extract, Vitamin B5 and hair conditioner. Free from artificial coloring, SLES, SLS, and Paraben. pH balanced for all hair types.',
    benefits: ['Ganoderma + Vitamin B5', 'SLES & SLS free', 'Built-in conditioner', 'Silky soft hair'],
  },
  {
    name: 'DXN Toothbrush (Adults)', sku: 'PC041', category: 'personal-care',
    price: 6.99, rating: 4.3, featured: false, inStock: true,
    image: IMG + 'PC041_Adult_Toothbrush_Group.jpg',
    description: 'Features a tongue cleaner on the back of the brush head to remove bacteria and promote fresh breath. Ergonomic easy-grip handle. Available in 4 colors.',
    benefits: ['Tongue cleaner built-in', 'Ergonomic handle', 'Removes bacteria', '4 color options'],
  },
  {
    name: 'DXN Toothbrush (Children)', sku: 'PC042', category: 'personal-care',
    price: 5.99, rating: 4.3, featured: false, inStock: true,
    image: IMG + 'PC042_Children_Toothbrush_Group.jpg',
    description: 'Designed for children with a tongue cleaner on the back of the brush head and an ergonomic easy-grip handle. Available in 4 colors.',
    benefits: ['Child-friendly design', 'Tongue cleaner included', 'Easy-grip handle', '4 color options'],
  },
  {
    name: 'DXN Zhimeko', sku: 'PC045', category: 'personal-care',
    price: 11.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'PC045_Zhimeko.jpg',
    description: 'Specially formulated using Ganoderma extract and Nutmeg Oil with a unique petrolatum base designed to spread evenly for quick relief and absorption.',
    benefits: ['Ganoderma + Nutmeg oil', 'Fast absorption', 'Petrolatum base', 'Quick relief'],
  },
  {
    name: 'DXN Oocha Trans Soap', sku: 'PC074', category: 'personal-care',
    price: 7.99, rating: 4.3, featured: false, inStock: true,
    image: IMG + 'PC074_Oocha_Trans_Soap.jpg',
    description: 'Fragrant bar soap with Camellia sinensis (tea) leaves powder. Maintains skin quality while preserving natural moisture. Keeps skin radiant, supple and smooth. 120g.',
    benefits: ['Tea leaf powder', 'Preserves skin moisture', 'Radiant smooth skin', 'Fragrant formula'],
  },
  {
    name: 'Ganozhi Soap', sku: 'PC120', category: 'personal-care',
    price: 8.99, rating: 4.3, featured: false, inStock: true,
    image: IMG + 'PC120_Ganozhi_Soap_80G.jpg',
    description: 'Enriched with Ganoderma extract and palm oil. Cleanses and moisturizes skin while maintaining natural oils in a single application. 80g bar.',
    benefits: ['Ganoderma + Palm oil', 'Moisturizing cleanse', 'Natural oils preserved', 'All skin types'],
  },
  {
    name: 'Tea Tree Cream', sku: 'PC014', category: 'personal-care',
    price: 13.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'TTC-TeaTreeCream.jpg',
    description: 'Soothing skin cream with tea tree oil. High skin penetration and gentle rapid absorbency with a refreshing tea tree scent. For skin hygiene and protection.',
    benefits: ['Tea tree oil formula', 'Rapid absorption', 'Skin protection', 'Safe for whole family'],
  },

  // ── SKINCARE ─────────────────────────────────────────────────────────────────
  {
    name: 'Ganozhi Toner', sku: 'SC009N', category: 'skincare',
    price: 22.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC010_Toner.jpg',
    description: 'Effective toner that minimizes skin pores while leaving skin soft and hydrated. Contains Ganoderma extract, Fagus sylvatica extract, allantoin, and propolis cera. 150ml.',
    benefits: ['Minimizes pores', 'Ganoderma extract', 'Hydrates and softens', 'Prepares skin for moisturizer'],
  },
  {
    name: 'Ganozhi Moisturizing Micro Emulsion', sku: 'SC010N', category: 'skincare',
    price: 28.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'SC011_MositurizingEmulsion.jpg',
    description: 'Advanced hydrating solution using nanotechnology. Contains Ganoderma, Fagus sylvatica, Ginseng, Arnica extracts and Vitamin E. Hydrates and nourishes, leaving skin smooth and radiant. 50ml.',
    benefits: ['Nanotechnology formula', 'Ganoderma + Ginseng', 'Vitamin E enriched', 'Smooth radiant skin'],
  },
  {
    name: 'Ganozhi Liquid Cleanser', sku: 'SC011N', category: 'skincare',
    price: 19.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'SC009_LiquidCleanser.jpg',
    description: 'Gentle yet effective cleanser with Ganoderma extract, Fagus sylvatica, yeast, and panthenol. Penetrates deeply to remove impurities while leaving skin clean and revitalized. 150ml.',
    benefits: ['Deep pore cleansing', 'Ganoderma + Panthenol', 'Revitalizes skin', 'Gentle formula'],
  },
  {
    name: 'DXN Chubby Baby Oil 200ml', sku: 'SC012', category: 'skincare',
    price: 16.99, rating: 4.6, featured: false, inStock: true,
    image: IMG + 'SC012_ChubbyBabyOil.jpg',
    description: 'Moisturizing skin conditioner for infants. Perfectly moisturizes baby\'s delicate skin, shielding against dryness and irritation. Also works as eye makeup remover. 200ml.',
    benefits: ['Baby-safe formula', 'Shields from dryness', 'Eye makeup remover', 'Soft smooth skin'],
  },
  {
    name: 'Ganozhi Lipstick - Coco Red', sku: 'SC014', category: 'skincare',
    price: 18.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC014_CocoRed.jpg',
    description: 'Hydrating lipstick enriched with Aloe Vera Extract, Shea Butter and Vitamin E. Smooth application with luminous coloring and natural shine.',
    benefits: ['Aloe Vera + Shea Butter', 'Vitamin E enriched', 'Luminous color', 'Natural shine'],
  },
  {
    name: 'Ganozhi Lipstick - Pearly Red', sku: 'SC015', category: 'skincare',
    price: 18.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC015_PearlyRed.jpg',
    description: 'Hydrating lipstick enriched with Aloe Vera Extract, Shea Butter and Vitamin E. Sparkling, luminous colour with a natural, subtle shine.',
    benefits: ['Aloe Vera + Shea Butter', 'Sparkling finish', 'Vitamin E enriched', 'Long-lasting colour'],
  },
  {
    name: 'Ganozhi Lipstick - Pearly Pink', sku: 'SC016', category: 'skincare',
    price: 18.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC016_PearlyPink.jpg',
    description: 'Hydrating lipstick enriched with Aloe Vera Extract, Shea Butter and Vitamin E. Luminous pink coloring with a natural shine.',
    benefits: ['Pretty pink shade', 'Aloe Vera + Shea Butter', 'Vitamin E enriched', 'Natural shine'],
  },
  {
    name: 'Ganozhi Lipstick - Pearly Grape', sku: 'SC017', category: 'skincare',
    price: 18.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'SC017_PearlyGrape.jpg',
    description: 'Hydrating lipstick enriched with Aloe Vera Extract, Shea Butter and Vitamin E. Luminous grape coloring with a natural shine.',
    benefits: ['Rich grape shade', 'Aloe Vera + Shea Butter', 'Vitamin E enriched', 'Natural shine'],
  },
  {
    name: 'DXN Aloe.V Cleansing Gel', sku: 'SC020', category: 'skincare',
    price: 17.99, rating: 4.4, featured: false, inStock: true,
    image: IMG + 'SC020_CleansingGel.jpg',
    description: 'Soap-free cleansing gel containing Aloe Vera extract. Gently cleanses while leaving skin fresh, supple and more radiant.',
    benefits: ['Soap-free formula', 'Aloe Vera extract', 'Leaves skin radiant', 'Gentle daily cleanser'],
  },
  {
    name: 'DXN Aloe.V Hydrating Toner', sku: 'SC021', category: 'skincare',
    price: 19.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC021_HydratingToner.jpg',
    description: 'Refreshing hydrating toner with Aloe Vera, witch hazel, and amino acids. Non-drying formula with pore-tightening properties that softens and leaves skin smooth and supple.',
    benefits: ['Aloe Vera + Witch hazel', 'Amino acid complex', 'Tightens pores', 'Non-drying formula'],
  },
  {
    name: 'DXN Aloe.V Aqua Gel', sku: 'SC022', category: 'skincare',
    price: 21.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC022_AquaGel.jpg',
    description: 'Special moisturizer that quickly absorbs, hydrates and moisturizes the skin. Contains Aloe Vera extract. Leaves skin clean, refreshed and soft.',
    benefits: ['Fast absorption', 'Aloe Vera hydration', 'Lightweight formula', 'Clean refreshed skin'],
  },
  {
    name: 'DXN Aloe.V Nutricare Cream', sku: 'SC023', category: 'skincare',
    price: 23.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC023_NutricareCream.jpg',
    description: 'Rich night cream with Aloe Vera and botanical extracts. Acts as a protective film to restore skin moisture loss while sleeping.',
    benefits: ['Night recovery cream', 'Aloe Vera blend', 'Restores moisture', 'Botanical extracts'],
  },
  {
    name: 'DXN Aloe.V Hand & Body Lotion', sku: 'SC024', category: 'skincare',
    price: 16.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC024_Hand&BodyLotion.jpg',
    description: 'Non-greasy moisturizing lotion with Aloe Vera Extract. Relieves dryness, softens skin and provides a refreshing sensation. Nourishes and maintains natural moisture.',
    benefits: ['Non-greasy formula', 'Aloe Vera extract', 'Relieves dryness', 'Long-lasting moisture'],
  },
  {
    name: 'DXN Chubby Baby Oil 40ml', sku: 'SC073', category: 'skincare',
    price: 9.99, rating: 4.5, featured: false, inStock: true,
    image: IMG + 'SC073_Chubby_Baby_Oil_40ml.jpg',
    description: 'Compact 40ml moisturizing skin conditioner for delicate baby skin. Protects from dryness, chapping and flaking. Leaves skin soft and smooth. Also usable for makeup removal.',
    benefits: ['Compact travel size', 'Baby-safe formula', 'Prevents dryness', 'Soft smooth skin'],
  },
];

async function seed() {
  try {
    await mongoose.connect(process.env.MONGODB_URI);
    console.log('Connected to MongoDB');

    await Product.deleteMany({});
    console.log('Cleared existing products');

    const result = await Product.insertMany(products);
    console.log(`\nSeeded ${result.length} products successfully!\n`);

    const categories = {};
    result.forEach((p) => { categories[p.category] = (categories[p.category] || 0) + 1; });
    console.log('Products by category:');
    Object.entries(categories).forEach(([cat, count]) => console.log(`  ${cat}: ${count}`));

    process.exit(0);
  } catch (err) {
    console.error('Seed error:', err.message);
    process.exit(1);
  }
}

seed();
