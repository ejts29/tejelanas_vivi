//src\components\Carousel.jsx

import React, { useState, useEffect } from 'react';
import { Box, IconButton, Grid } from '@mui/material';
import ArrowBackIosNewIcon from '@mui/icons-material/ArrowBackIosNew';
import ArrowForwardIosIcon from '@mui/icons-material/ArrowForwardIos';

const Carousel = ({ items, renderItem, itemsPerPage = 3 }) => {
    const [currentIndex, setCurrentIndex] = useState(0);
    const [visibleCount, setVisibleCount] = useState(itemsPerPage);

    useEffect(() => {
        const updateVisibleCount = () => {
            const width = window.innerWidth;
            if (width >= 1024) setVisibleCount(itemsPerPage);
            else if (width >= 768) setVisibleCount(Math.min(2, itemsPerPage));
            else setVisibleCount(1);
        };
        updateVisibleCount();
        window.addEventListener('resize', updateVisibleCount);
        return () => window.removeEventListener('resize', updateVisibleCount);
    }, [itemsPerPage]);

    const totalPages = Math.ceil(items.length / visibleCount);

    const handlePrev = () => {
        setCurrentIndex((prev) => (prev === 0 ? totalPages - 1 : prev - 1));
    };

    const handleNext = () => {
        setCurrentIndex((prev) => (prev === totalPages - 1 ? 0 : prev + 1));
    };

    const start = currentIndex * visibleCount;
    const visibleItems = items.slice(start, start + visibleCount);

    return (
        <Box position="relative" maxWidth="lg" mx="auto" py={4}>
            <IconButton
                aria-label="Previous"
                onClick={handlePrev}
                sx={{ position: 'absolute', top: '50%', left: 0, transform: 'translateY(-50%)', zIndex: 10 }}
            >
                <ArrowBackIosNewIcon color="primary" />
            </IconButton>

            <Grid container spacing={2} justifyContent="center">
                {visibleItems.map((item, idx) => (
                    <Grid item key={idx} xs={12} sm={6} md={Math.floor(12 / visibleCount)}>
                        {renderItem(item)}
                    </Grid>
                ))}
            </Grid>

            <IconButton
                aria-label="Next"
                onClick={handleNext}
                sx={{ position: 'absolute', top: '50%', right: 0, transform: 'translateY(-50%)', zIndex: 10 }}
            >
                <ArrowForwardIosIcon color="primary" />
            </IconButton>
        </Box>
    );
};

export default Carousel;
