//src\components\ProductCard.jsx
import React from 'react';
import { Card, CardMedia, CardContent, Typography, Button, Box } from '@mui/material';

const ProductCard = ({ image, title, description, price, onContactProduct }) => {
    // La función que maneja el clic para el botón "Contáctanos"
    const handleContactClick = () => {
        if (onContactProduct) {
            onContactProduct(title); // Llama a la función onContactProduct, pasando el título del producto
        }
    };

    return (
        <Card sx={{ maxWidth: 345, m: 1, display: 'flex', flexDirection: 'column', height: '100%' }}>
            <CardMedia
                component="img"
                height="180" // Mantiene la altura compacta 
                image={image}
                alt={title}
            />
            <CardContent sx={{ flexGrow: 1 }}>
                <Typography variant="h6" gutterBottom color="primary">
                    {title}
                </Typography>
                <Typography variant="body2" color="text.secondary">
                    {description}
                </Typography>
                <Box mt={2} display="flex" justifyContent="space-between" alignItems="center">
                    <Typography variant="subtitle1" fontWeight="bold" color="primary">
                        {price}
                    </Typography>
                    {/* Un solo botón: "Contáctanos", con el estilo del botón "Añadir" */}
                    <Button
                        variant="contained" // Estilo de botón rellenado
                        size="small"      // Tamaño pequeño
                        onClick={handleContactClick} // Lógica para pre-rellenar el formulario
                    >
                        Añadir
                    </Button>
                </Box>
            </CardContent>
        </Card>
    );
};

export default ProductCard;