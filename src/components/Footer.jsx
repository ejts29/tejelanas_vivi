//src\components\Footer.jsx

import React from 'react';
import { Box, Grid, Typography, TextField, Button, Link, Stack, IconButton } from '@mui/material';
import InstagramIcon from '@mui/icons-material/Instagram';
import FacebookIcon from '@mui/icons-material/Facebook';
import WhatsAppIcon from '@mui/icons-material/WhatsApp';
import PinterestIcon from '@mui/icons-material/Pinterest';
import LocationOnIcon from '@mui/icons-material/LocationOn';
import PhoneIcon from '@mui/icons-material/Phone';
import EmailIcon from '@mui/icons-material/Email';
import AccessTimeIcon from '@mui/icons-material/AccessTime';

const Footer = () => {
    const handleSubmit = (event) => {
        event.preventDefault();
        alert('¡Gracias por suscribirte!');
    };

    return (
        <Box component="footer" sx={{ bgcolor: 'primary.main', color: 'common.white', py: 6 }}>
            <Box sx={{ maxWidth: 1200, mx: 'auto', px: { xs: 2, sm: 3, lg: 4 } }}>
                <Grid container spacing={4}>
                    <Grid item xs={12} md={6} lg={3}>
                        <Typography variant="h6" sx={{ fontFamily: 'Pacifico, cursive', mb: 2 }}>
                            Tejelanas Vivi
                        </Typography>
                        <Typography variant="body2" sx={{ color: 'rgba(255,255,255,0.8)', mb: 3 }}>
                            Artesanía y pasión por el tejido en cada hilo. Desde 2015 compartiendo el arte del tejido en Laguna de Zapallar.
                        </Typography>
                        <Box sx={{ display: 'flex', gap: 2 }}>
                            <IconButton
                                component="a"
                                href="https://www.instagram.com/teje_lanas.vivi"
                                target="_blank"
                                rel="noopener noreferrer"
                                sx={{ color: 'inherit', '&:hover': { color: 'rgba(255,255,255,0.8)' } }}
                                aria-label="Instagram"
                            >
                                <InstagramIcon fontSize="large" />
                            </IconButton>
                            <IconButton
                                component="a"
                                href="https://www.facebook.com/viviana.m.orrego.5/"
                                target="_blank"
                                rel="noopener noreferrer"
                                sx={{ color: 'inherit', '&:hover': { color: 'rgba(255,255,255,0.8)' } }}
                                aria-label="Facebook"
                            >
                                <FacebookIcon fontSize="large" />
                            </IconButton>
                            <IconButton
                                component="a"
                                href="https://wa.me/56976322314"
                                target="_blank"
                                rel="noopener noreferrer"
                                sx={{ color: 'inherit', '&:hover': { color: 'rgba(255,255,255,0.8)' } }}
                                aria-label="WhatsApp"
                            >
                                <WhatsAppIcon fontSize="large" />
                            </IconButton>

                            <IconButton component="a" href="#" sx={{ color: 'inherit', '&:hover': { color: 'rgba(255,255,255,0.8)' } }} aria-label="Pinterest">
                                <PinterestIcon fontSize="large" />
                            </IconButton>
                        </Box>

                        <Box
                            sx={{
                                mt: 4,
                                width: '100%',
                                maxWidth: 700, // Cambiado a número para consistencia con el manejo de unidades predeterminado de Material-UI
                                height: 0,
                                paddingBottom: '30%', // Aumentado paddingBottom para una relación de aspecto más estándar del mapa (ej. 4:3 o 16:9)
                                position: 'relative',
                                borderRadius: 2,
                                overflow: 'hidden',
                                boxShadow: 3,
                            }}
                        >
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1715.4261778939023!2d-71.42731442129758!3d-32.62958459461125!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x9689ba4b807a5643%3A0x8b7a2c22b0624617!2sCarlos%20Le%C3%B3n%201202%2C%20La%20Laguna%2C%20Zapallar%2C%20Valpara%C3%Ado!5e0!3m2!1ses-419!2scl!4v1716801946000!5m2!1ses-419!2scl"
                                width="100%"
                                height="100%"
                                style={{ border: 0, position: 'absolute', top: 0, left: 0 }}
                                allowFullScreen=""
                                loading="lazy"
                                referrerPolicy="no-referrer-when-downgrade"
                                title="Ubicación en Google Maps" // Añadido un título para accesibilidad
                            ></iframe>
                        </Box>
                    </Grid>

                    <Grid item xs={12} md={6} lg={3}>
                        <Typography variant="h6" sx={{ fontWeight: 500, fontSize: '1.125rem', mb: 2 }}>
                            Enlaces rápidos
                        </Typography>
                        <Stack
                            component="nav"
                            direction="row"
                            flexWrap="wrap"
                            spacing={2}
                            sx={{ listStyle: 'none', p: 0, m: 0 }}
                        >
                            {['Inicio', 'Servicios', 'Productos', 'Talleres', 'Contacto', 'FAQ'].map((text) => (
                                <Link
                                    key={text}
                                    href={`#${text.toLowerCase()}`}
                                    underline="none"
                                    sx={{
                                        color: 'rgba(255,255,255,0.8)',
                                        '&:hover': { color: '#fff' },
                                        whiteSpace: 'nowrap',
                                        fontWeight: 500,
                                    }}
                                >
                                    {text}
                                </Link>
                            ))}
                        </Stack>
                    </Grid>

                    <Grid item xs={12} md={6} lg={3}>
                        <Typography variant="h6" sx={{ fontWeight: 500, fontSize: '1.125rem', mb: 2 }}>
                            Contacto
                        </Typography>
                        <Stack component="ul" spacing={1} sx={{ listStyle: 'none', p: 0, m: 0 }}>
                            <li>
                                <Box sx={{ display: 'flex', alignItems: 'flex-start' }}>
                                    <LocationOnIcon sx={{ fontSize: 20, mr: 1, mt: '2px' }} />
                                    <Typography variant="body2" sx={{ color: 'rgba(255,255,255,0.8)' }}>
                                        Carlos León 1202, La Laguna, Zapallar, Valparaíso
                                    </Typography>
                                </Box>
                            </li>
                            <li>
                                <Box sx={{ display: 'flex', alignItems: 'flex-start' }}>
                                    <PhoneIcon sx={{ fontSize: 20, mr: 1, mt: '2px' }} />
                                    <Typography variant="body2" sx={{ color: 'rgba(255,255,255,0.8)' }}>
                                        +56 9 7632 2314
                                    </Typography>
                                </Box>
                            </li>
                            <li>
                                <Box sx={{ display: 'flex', alignItems: 'flex-start' }}>
                                    <EmailIcon sx={{ fontSize: 20, mr: 1, mt: '2px' }} />
                                    <Typography variant="body2" sx={{ color: 'rgba(255,255,255,0.8)' }}>
                                        contacto@tejelanasvivi.cl
                                    </Typography>
                                </Box>
                            </li>
                            <li>
                                <Box sx={{ display: 'flex', alignItems: 'flex-start' }}>
                                    <AccessTimeIcon sx={{ fontSize: 20, mr: 1, mt: '2px' }} />
                                    <Typography variant="body2" sx={{ color: 'rgba(255,255,255,0.8)' }}>
                                        Lun-Vie: 10:00 - 18:00<br />
                                        Sáb: 10:00 - 14:00
                                    </Typography>
                                </Box>
                            </li>
                        </Stack>
                    </Grid>

                    <Grid item xs={12} md={6} lg={3}>
                        <Typography variant="h6" sx={{ fontWeight: 500, fontSize: '1.125rem', mb: 2 }}>
                            Newsletter
                        </Typography>
                        <Typography variant="body2" sx={{ color: 'rgba(255,255,255,0.8)', mb: 3 }}>
                            Suscríbete para recibir novedades, ofertas exclusivas y consejos de tejido.
                        </Typography>
                        <Box component="form" onSubmit={handleSubmit} sx={{ display: 'flex', flexDirection: 'column', gap: 2 }}>
                            <TextField
                                type="email"
                                placeholder="Tu correo electrónico"
                                required
                                fullWidth
                                variant="outlined"
                                sx={{
                                    input: { color: 'common.white', '::placeholder': { color: 'rgba(255,255,255,0.5)' } },
                                    '& .MuiOutlinedInput-root': {
                                        '& fieldset': { borderColor: 'rgba(255,255,255,0.2)' },
                                        '&:hover fieldset': { borderColor: 'rgba(255,255,255,0.5)' },
                                        '&.Mui-focused fieldset': { borderColor: 'rgba(255,255,255,0.5)' }
                                    }
                                }}
                            />
                            <Button
                                type="submit"
                                fullWidth
                                variant="contained"
                                sx={{
                                    bgcolor: 'common.white',
                                    color: 'primary.main',
                                    fontWeight: 500,
                                    textTransform: 'none',
                                    borderRadius: '8px',
                                    '&:hover': { bgcolor: 'rgba(255,255,255,0.9)' }
                                }}
                            >
                                Suscribirme
                            </Button>
                        </Box>
                    </Grid>
                </Grid>

                <Box
                    sx={{
                        borderTop: '1px solid rgba(255,255,255,0.2)',
                        mt: 5,
                        pt: 3,
                        display: 'flex',
                        flexDirection: { xs: 'column', md: 'row' },
                        alignItems: 'center',
                        justifyContent: 'space-between'
                    }}
                >
                    <Typography variant="body2" sx={{ color: 'rgba(255,255,255,0.8)', mb: { xs: 2, md: 0 } }}>
                        © 2025 Tejelanas Vivi. Todos los derechos reservados.
                    </Typography>
                    <Stack direction="row" spacing={3}>
                        <Link href="#" variant="body2" underline="none" sx={{ color: 'rgba(255,255,255,0.8)', '&:hover': { color: '#fff' } }}>
                            Política de privacidad
                        </Link>
                        <Link href="#" variant="body2" underline="none" sx={{ color: 'rgba(255,255,255,0.8)', '&:hover': { color: '#fff' } }}>
                            Términos y condiciones
                        </Link>
                        <Link href="#" variant="body2" underline="none" sx={{ color: 'rgba(255,255,255,0.8)', '&:hover': { color: '#fff' } }}>
                            Política de cookies
                        </Link>
                    </Stack>
                </Box>
            </Box>
        </Box>
    );
};

export default Footer;

