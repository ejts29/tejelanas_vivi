// src/components/ServiceCard.jsx
import React from 'react';
import { Card, CardContent, CardMedia, Typography, Button, Box } from '@mui/material';
// No necesitas useNavigate aquí si la lógica de navegación la maneja el componente padre (Productos)

const ServiceCard = ({ title, description, image, onContactClick }) => {
    const handleContactButtonClick = () => {
        if (onContactClick) {
            // Llama a la función que viene de las props con el título del producto
            onContactClick(title);
        }
    };

    return (
        <Card sx={{
            height: 'auto',
            display: 'flex',
            flexDirection: 'row',
            borderRadius: 2,
            boxShadow: 3,
            width: '100%',
            alignItems: 'center'
        }}>
            <CardMedia
                component="img"
                sx={{
                    width: 200,
                    minWidth: 200,
                    height: '100%',
                    objectFit: 'cover',
                    borderRadius: '2px 0 0 2px'
                }}
                image={image}
                alt={title}
            />
            <CardContent sx={{ flexGrow: 1, p: 3 }}>
                <Typography gutterBottom variant="h6" component="div" color="primary" fontWeight="bold">
                    {title}
                </Typography>
                <Typography variant="body2" color="text.secondary" sx={{ mb: 2 }}>
                    {description}
                </Typography>
            </CardContent>
            <Box sx={{ p: 2, display: 'flex', alignItems: 'flex-end' }}>
                <Button
                    variant="contained"
                    color="primary"
                    onClick={handleContactButtonClick}
                >
                    Contáctanos
                </Button>
            </Box>
        </Card>
    );
};

export default ServiceCard;