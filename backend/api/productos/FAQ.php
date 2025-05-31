<?php
// tejelanas_vivi\backend\api\productos\FAQ.php

header('Content-Type: application/json');
header("Access-Control-Allow-Origin: *");

$preguntas = [
    [
        "question" => "¿Qué materiales se incluyen en los talleres?",
        "answer" => "En todos nuestros talleres incluimos los materiales básicos necesarios para completar el proyecto: lanas, agujas y accesorios. Si deseas trabajar con materiales específicos o de mayor calidad, puedes adquirirlos por separado en nuestra tienda con un 10% de descuento al estar inscrito en un taller."
    ],
    [
        "question" => "¿Cuál es la política de cancelación de talleres?",
        "answer" => "Puedes cancelar tu inscripción hasta 72 horas antes del inicio del taller para recibir un reembolso completo. Si cancelas entre 72 y 24 horas antes, recibirás un reembolso del 50%. Para cancelaciones con menos de 24 horas de anticipación, no se realizan reembolsos, pero puedes transferir tu cupo a otra persona o utilizarlo en un taller futuro dentro de los próximos 3 meses."
    ],
    [
        "question" => "¿Realizan envíos a todo Chile?",
        "answer" => "Sí, realizamos envíos a todo Chile a través de empresas de courier confiables. Los tiempos de entrega varían según la ubicación: para la Región Metropolitana entre 1-3 días hábiles, y para regiones entre 3-5 días hábiles. Los costos de envío se calculan según el peso y destino. Para compras superiores a $30.000, el envío es gratuito a todo Chile."
    ],
    [
        "question" => "¿Ofrecen talleres personalizados para grupos?",
        "answer" => "Sí, ofrecemos talleres personalizados para grupos a partir de 5 personas. Puedes elegir la temática, el nivel y la fecha que más te convenga. También organizamos talleres para eventos especiales como cumpleaños, despedidas de soltera o actividades de team building para empresas. Contáctanos para más información y cotizaciones personalizadas."
    ],
    [
        "question" => "¿Qué métodos de pago aceptan?",
        "answer" => "Aceptamos diversos métodos de pago para tu comodidad: tarjetas de crédito y débito (Visa, Mastercard, American Express), transferencia bancaria, WebPay, y efectivo en nuestra tienda física. Para los talleres, puedes pagar el 50% como reserva y el resto el día del taller. También ofrecemos la opción de pago en cuotas sin interés con tarjetas de crédito seleccionadas."
    ],
    [
        "question" => "¿Tienen programa de fidelización?",
        "answer" => "Sí, contamos con el programa \"Tejedoras Vivi\" que te permite acumular puntos por cada compra o taller. Estos puntos pueden canjearse por descuentos, productos o inscripciones a talleres. Además, los miembros del programa reciben acceso anticipado a nuevas colecciones, invitaciones a eventos exclusivos y ofertas especiales. Pregunta en nuestra tienda cómo unirte al programa."
    ]
];

echo json_encode($preguntas, JSON_UNESCAPED_UNICODE);
?>
