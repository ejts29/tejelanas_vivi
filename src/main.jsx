// tejelanas_vivi\src\main.jsx
import React from 'react';
import ReactDOM from 'react-dom/client';
import App from './App.jsx'; // Asegúrate de que la extensión sea correcta (App.js o App.jsx)
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";

// Importa la fuente Pacifico si la estás usando
import '@fontsource/pacifico';

// Importa los componentes de Material-UI y las utilidades de tema
import { CssBaseline, ThemeProvider, createTheme } from '@mui/material';
import { BrowserRouter } from 'react-router-dom'; // Importa BrowserRouter aquí

// Define tu tema de Material-UI
const theme = createTheme({
  palette: {
    primary: {
      main: '#6B4226', // Color principal de tu paleta
    },
    secondary: {
      main: '#F5F5DC', // Color secundario de tu paleta
    },
  },
  typography: {
    fontFamily: ['Roboto', 'Arial', 'sans-serif'].join(','), // Fuentes tipográficas
  },
});

// Renderiza tu aplicación
ReactDOM.createRoot(document.getElementById('root')).render(
  <React.StrictMode>
    {/* IMPORTANTE: <BrowserRouter> DEBE ENVOLVER TODO AQUÍ Y SOLO AQUÍ */}
    <BrowserRouter>
      <ThemeProvider theme={theme}>
        <CssBaseline /> {/* Normaliza los estilos CSS */}
        <App /> {/* Tu componente principal de la aplicación */}
      </ThemeProvider>
    </BrowserRouter>
  </React.StrictMode>
);