// src\components\WorkshopCard.jsx
import React from 'react';
import { Card, CardContent, Typography } from '@mui/material';

const WorkshopCard = ({ title, description, date, location, price }) => (
    <Card sx={{ maxWidth: 400, m: 1 }}>
        <CardContent>
            <Typography variant="h6" color="primary" gutterBottom>
                {title}
            </Typography>
            <Typography variant="body2" paragraph>
                {description}
            </Typography>
            <Typography variant="body2" color="text.secondary">
                <strong>Fecha:</strong> {date}
            </Typography>
            <Typography variant="body2" color="text.secondary" gutterBottom>
                <strong>Lugar:</strong> {location}
            </Typography>
            <Typography variant="subtitle1" color="primary" fontWeight="bold">
                {price}
            </Typography>
        </CardContent>
    </Card>
);

export default WorkshopCard;
