/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./login.php",
    "./dashboardSuperAdmin.php",
    "./inventorySuperAdmin.php",
    "./bookingSuperAdmin.php",
    "./riwayatSuperAdmin.php",
    "./servisSuperAdmin.php",
    "./userSuperAdmin.php",
    // "./components/main/header.php",
    // "./components/main/sidebar.php",
    "./components/**/*.{html,js,php}",
    // "./components/usersuper/tables/admin.php",
    "./components/usersuper/modals/editAdmin.php",
    "./components/usersuper/modals/addAdmin.php",
  ],
  theme: {
    colors: {
      primary_050: "#FEFFA5",
      primary_100: "#FDFF93",
      primary_200: "#FDFF81",
      primary_300: "#FDFF6F",
      primary_400: "#FDFF5D",
      primary_500: "#FDFF4C",
      primary_600: "#E3E544",
      primary_700: "#CACC3C",
      primary_800: "#B1B235",
      primary_900: "#97992D",
      secondary_050: "#87CCFF",
      secondary_100: "#60BBFF",
      secondary_200: "#4CB3FF",
      secondary_300: "#38ABFF",
      secondary_400: "#25A2FF",
      secondary_500: "#119AFF",
      secondary_600: "#0086E9",
      secondary_700: "#007BD5",
      secondary_800: "#006FC2",
      secondary_900: "#00599A",
      teriary_050: "#D1AEFF",
      teriary_100: "#BB87FF",
      teriary_200: "#A460FF",
      teriary_300: "#994CFF",
      teriary_400: "#8325FF",
      teriary_500: "#7711FF",
      teriary_600: "#6400E9",
      teriary_700: "#5C00D5",
      teriary_800: "#5300C2",
      teriary_900: "#4B00AE",
      neutral_050: "#FAFAFA",
      neutral_100: "#F5F5F5",
      neutral_200: "#EEEEEE",
      neutral_300: "#D6D6D6",
      neutral_400: "#BDBDBD",
      neutral_500: "#9E9E9E",
      neutral_600: "#757575",
      neutral_700: "#616161",
      neutral_800: "#424242",
      neutral_900: "#303030",
      error_050: "#FFEBEE",
      error_100: "#FFCDD2",
      error_200: "#EF9A9A",
      error_300: "#E57373",
      error_400: "#EF5350",
      error_500: "#F44336",
      error_600: "#E53935",
      error_700: "#D32F2F",
      error_800: "#C62828",
      error_900: "#B71C1C",
      black: "#000000",
    },
    fontSize: {
      xs: "0.75rem",
      sm: "0.875rem",
      base: "1rem",
      lg: "1.125rem",
      xl: "1.25rem",
      "2xl": "1.5rem",
      "3xl": "1.75rem",
      "4xl": "2rem",
      "5xl": "2.25rem",
      "6xl": "2.8125rem",
      "7xl": "3.5625rem",
    },
    fontFamily: {
      "noto-sans": "Noto Sans",
    },
    boxShadow: {
      "elevation-light-1": "0px 1px 3px 1px rgba(0,0,0,0.15), 0px 1px 2px 0px rgba(0,0,0,0.3)",
      "elevation-light-2": "0px 2px 6px 2px rgba(0,0,0,0.15), 0px 1px 2px 0px rgba(0,0,0,0.3)",
      "elevation-light-3": "0px 1px 3px 0px rgba(0,0,0,0.3), 0px 4px 8px 3px rgba(0,0,0,0.15)",
      "elevation-light-4": "0px 2px 3px 0px rgba(0,0,0,0.3), 0px 6px 10px 4px rgba(0,0,0,0.15)",
      "elevation-light-5": "0px 4px 4px 0px rgba(0,0,0,0.3), 0px 8px 12px 6px rgba(0,0,0,0.15)",
      "elevation-dark-1": "0px 1px 2px 0px rgba(0,0,0,0.3), 0px 1px 3px 1px rgba(0,0,0,0.15)",
      "elevation-dark-2": "0px 1px 2px 0px rgba(0,0,0,0.3), 0px 2px 6px 2px rgba(0,0,0,0.15)",
      "elevation-dark-3": "0px 1px 3px 0px rgba(0,0,0,0.3), 0px 4px 8px 3px rgba(0,0,0,0.15)",
      "elevation-dark-4": "0px 2px 3px 0px rgba(0,0,0,0.3), 0px 6px 10px 4px rgba(0,0,0,0.15)",
      "elevation-dark-5": "0px 4px 4px 0px rgba(0,0,0,0.3), 0px 8px 12px 6px rgba(0,0,0,0.15)",
    },
    borderRadius: {
      none: "0",
      xs: "0.125rem",
      sm: "0.25rem",
      default: "0.3125rem",
      lg: "0.40625rem",
      xl: "0.4375rem",
      full: "9999px",
      "2xl": "0.5rem",
      "3xl": "0.625rem",
      "4xl": "1rem",
      "5xl": "1.25rem",
      "6xl": "1.5rem",
      "7xl": "2.5rem",
    },
    screens: {
      xs: "316px",
      sm: "580px",
      md: "678px",
      lg: "878px",
      xl: "1219px",
      "2xl": "1736px",
    },
    duration: {
      0: "0ms",
      100: "100ms",
      200: "200ms",
      300: "300ms",
      400: "400ms",
      500: "500ms",
      600: "600ms",
      700: "700ms",
      800: "800ms",
      900: "900ms",
      1000: "1000ms",
    },
    extend: {
      animation: {
        "spin-slow": "spin 6s linear infinite",
        "spin-delay": "spin 6s linear infinite -3s",
      },
      backgroundImage: {
        "foto-tambah": "url('/public/plusfoto.svg')",
      },
      keyframes: {
        slidedown: {
          "0%": { transform: "translateY(-100%)" },
          "100%": { transform: "translateY(0%)" },
        },
        slideup: {
          "0%": { transform: "translateY(0%)" },
          "100%": { transform: "translateY(-100%)" },
        },
        mid: {
          "0%": { transform: "translateY(0%)" },
          "50%": { transform: "translateY(-100%)" },
          "100%": { transform: "translateY(0%)" },
        },
      },
    },
  },
  plugins: [require("daisyui")],
};
