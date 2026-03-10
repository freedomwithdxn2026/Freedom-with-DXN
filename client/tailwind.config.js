/** @type {import('tailwindcss').Config} */
export default {
  content: ['./index.html', './src/**/*.{js,ts,jsx,tsx}'],
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#f0fdf4',
          100: '#dcfce7',
          200: '#bbf7d0',
          300: '#86efac',
          400: '#4ade80',
          500: '#22c55e',
          600: '#16a34a',
          700: '#15803d',
          800: '#166534',
          900: '#14532d',
          950: '#052e16',
        },
        gold: {
          400: '#dfc378',
          500: '#dfc378',
          600: '#dcca8b',
        },
        dxn: {
          green: '#16392d',
          darkgreen: '#0c3935',
          gold: '#dfc378',
          lightgold: '#dcca8b',
        },
      },
      fontFamily: {
        sans: ['Inter', 'system-ui', 'sans-serif'],
      },
      backgroundImage: {
        'hero-pattern': "linear-gradient(135deg, #0c3935 0%, #16392d 50%, #1e4d3d 100%)",
      },
    },
  },
  plugins: [],
};
