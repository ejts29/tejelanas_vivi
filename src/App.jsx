// tejelanas_vivi\src\App.jsx
import React, { useState, useEffect } from 'react';
import { Routes, Route } from 'react-router-dom';

// Componentes base
import Navbar from './components/Navbar';
import Hero from './components/Hero';
import Services from './components/Services';
import ProductsCarousel from './components/ProductsCarousel';
import Workshops from './components/Workshops';
import ContactForm from './components/ContactForm';
import FAQ from './components/FAQ';
import Footer from './components/Footer';
import ArtGallery from './components/ArtGallery';
import QuienesSomos from './components/QuienesSomos';

// Páginas individuales
import Productos from './components/Productos';
import Contacto from './components/Contacto';

function App() {
  const [selectedProduct, setSelectedProduct] = useState(null);
  const [selectedService, setSelectedService] = useState(null);
  const [scrollToContact, setScrollToContact] = useState(false);

  const handleContactProduct = (productTitle) => {
    setSelectedProduct(productTitle);
    setSelectedService(null);
    setScrollToContact(true);
  };

  const handleContactService = (serviceTitle) => {
    setSelectedService(serviceTitle);
    setSelectedProduct(null);
    setScrollToContact(true);
  };

  useEffect(() => {
    if (scrollToContact) {
      const contactSection = document.getElementById('contacto');
      if (contactSection) {
        contactSection.scrollIntoView({ behavior: 'smooth' });
        setScrollToContact(false);
      }
    }
  }, [scrollToContact]);

  const handleAddProduct = (productName) => {
    alert(`Has añadido el producto: ${productName}`);
  };

  return (
    <>
      <Navbar />

      <main style={{ marginTop: 64 }}>
        <Routes>
          {/* Página principal */}
          <Route
            path="/"
            element={
              <>
                <Hero />
                <QuienesSomos />
                <Services onContactService={handleContactService} />
                <ProductsCarousel
                  onAdd={handleAddProduct}
                  onContactProduct={handleContactProduct}
                />
                <Productos />
                <Workshops />
                <ArtGallery />
                <FAQ />
                <ContactForm
                  id="contacto"
                  selectedProduct={selectedProduct}
                  selectedService={selectedService}
                />
              </>
            }
          />

          {/* Otras páginas */}
          <Route path="/productos" element={<Productos />} />
          <Route path="/contacto" element={<Contacto />} />
        </Routes>
      </main>

      <Footer />
    </>
  );
}

export default App;
