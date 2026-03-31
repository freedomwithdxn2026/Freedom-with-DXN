const puppeteer = require('puppeteer');
const path = require('path');
const fs = require('fs');

const BASE_URL = process.argv[2] || 'https://freedomwithdxn.com';
const OUTPUT_DIR = path.join(__dirname, 'screenshots');

// Pages to capture
const PAGES = [
  { name: 'home', path: '/' },
  { name: 'products', path: '/products' },
  { name: 'about', path: '/about' },
  { name: 'business', path: '/business' },
  { name: 'join', path: '/join' },
  { name: 'blog', path: '/blog' },
  { name: 'contact', path: '/contact' },
  { name: 'login', path: '/login' },
  { name: 'register', path: '/register' },
];

// Viewports to test
const VIEWPORTS = [
  { name: 'desktop', width: 1440, height: 900 },
  { name: 'mobile', width: 375, height: 812 },
];

async function takeScreenshots() {
  // Parse CLI flags
  const args = process.argv.slice(2).filter(a => !a.startsWith('http'));
  const pagesFilter = args.find(a => a.startsWith('--pages='));
  const viewportFilter = args.find(a => a.startsWith('--viewport='));
  const fullPage = !args.includes('--no-fullpage');
  const customPath = args.find(a => a.startsWith('--path='));

  let pagesToCapture = PAGES;
  let viewportsToUse = VIEWPORTS;

  if (pagesFilter) {
    const names = pagesFilter.split('=')[1].split(',');
    pagesToCapture = PAGES.filter(p => names.includes(p.name));
    if (pagesToCapture.length === 0) {
      console.error(`No matching pages. Available: ${PAGES.map(p => p.name).join(', ')}`);
      process.exit(1);
    }
  }

  if (customPath) {
    const cp = customPath.split('=')[1];
    pagesToCapture = [{ name: cp.replace(/\//g, '_').replace(/^_/, '') || 'root', path: cp }];
  }

  if (viewportFilter) {
    const name = viewportFilter.split('=')[1];
    viewportsToUse = VIEWPORTS.filter(v => v.name === name);
  }

  // Create output dir
  if (!fs.existsSync(OUTPUT_DIR)) {
    fs.mkdirSync(OUTPUT_DIR, { recursive: true });
  }

  console.log(`Taking screenshots of: ${BASE_URL}`);
  console.log(`Pages: ${pagesToCapture.map(p => p.name).join(', ')}`);
  console.log(`Viewports: ${viewportsToUse.map(v => v.name).join(', ')}`);
  console.log(`Output: ${OUTPUT_DIR}\n`);

  const browser = await puppeteer.launch({
    headless: 'new',
    args: ['--no-sandbox', '--disable-setuid-sandbox'],
  });

  const results = [];

  for (const viewport of viewportsToUse) {
    const page = await browser.newPage();
    await page.setViewport({ width: viewport.width, height: viewport.height });

    for (const pg of pagesToCapture) {
      const url = `${BASE_URL}${pg.path}`;
      const filename = `${pg.name}_${viewport.name}.png`;
      const filepath = path.join(OUTPUT_DIR, filename);

      try {
        console.log(`Capturing ${pg.name} (${viewport.name})...`);
        await page.goto(url, { waitUntil: 'networkidle2', timeout: 30000 });
        // Wait a bit for animations/lazy content
        await new Promise(r => setTimeout(r, 1000));
        await page.screenshot({ path: filepath, fullPage });
        console.log(`  -> ${filename}`);
        results.push({ page: pg.name, viewport: viewport.name, file: filepath, status: 'ok' });
      } catch (err) {
        console.error(`  ERROR on ${pg.name}: ${err.message}`);
        // Try to capture whatever loaded
        try {
          await page.screenshot({ path: filepath, fullPage });
          results.push({ page: pg.name, viewport: viewport.name, file: filepath, status: 'error-partial' });
        } catch {
          results.push({ page: pg.name, viewport: viewport.name, file: null, status: 'failed' });
        }
      }
    }

    await page.close();
  }

  await browser.close();

  // Summary
  console.log('\n--- Summary ---');
  const outputFiles = [];
  for (const r of results) {
    const icon = r.status === 'ok' ? 'OK' : r.status === 'error-partial' ? 'PARTIAL' : 'FAIL';
    console.log(`[${icon}] ${r.page} (${r.viewport}) ${r.file || ''}`);
    if (r.file) outputFiles.push(r.file);
  }
  console.log(`\nScreenshots saved to: ${OUTPUT_DIR}`);
  console.log(`Files: ${outputFiles.length}`);
}

takeScreenshots().catch(err => {
  console.error('Fatal error:', err);
  process.exit(1);
});
