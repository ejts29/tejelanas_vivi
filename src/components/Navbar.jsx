//src\components\Navbar.jsx

import React, { useState } from 'react';
import { AppBar, Toolbar, Typography, IconButton, Menu, MenuItem, Box, Button } from '@mui/material';
import MenuIcon from '@mui/icons-material/Menu';

const navItems = ['inicio', 'servicios', 'productos', 'talleres', 'contacto', 'faq'];

const Navbar = () => {
    const [anchorEl, setAnchorEl] = useState(null);

    const handleMenu = (event) => setAnchorEl(event.currentTarget);
    const handleClose = () => setAnchorEl(null);

    return (
        <AppBar position="fixed" color="primary">
            <Toolbar>
                <Typography
                    variant="h6"
                    component="a"
                    href="#inicio"
                    sx={{ flexGrow: 1, color: 'inherit', textDecoration: 'none', fontFamily: 'Pacifico' }}
                >
                    Tejelanas Vivi
                </Typography>

                <Box sx={{ display: { xs: 'none', md: 'flex' } }}>
                    {navItems.map((item) => (
                        <Button
                            key={item}
                            component="a"
                            href={`#${item}`}
                            sx={{ color: 'white', textTransform: 'capitalize' }}
                        >
                            {item}
                        </Button>
                    ))}
                </Box>

                <Box sx={{ display: { xs: 'flex', md: 'none' } }}>
                    <IconButton size="large" color="inherit" onClick={handleMenu}>
                        <MenuIcon />
                    </IconButton>
                    <Menu anchorEl={anchorEl} open={Boolean(anchorEl)} onClose={handleClose}>
                        {navItems.map((item) => (
                            <MenuItem key={item} component="a" href={`#${item}`} onClick={handleClose} sx={{ textTransform: 'capitalize' }}>
                                {item}
                            </MenuItem>
                        ))}
                    </Menu>
                </Box>
            </Toolbar>
        </AppBar>
    );
};

export default Navbar;
