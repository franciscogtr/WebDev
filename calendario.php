<?php
// Função para criar um calendário dinâmico
function generateCalendar($month, $year) {
    $daysOfWeek = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sáb'];
    $daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);
    $firstDayOfMonth = date('w', strtotime("$year-$month-01"));

    // Criação do calendário
    $calendar = '<table class="calendar">';
    $calendar .= '<thead><tr>';
    foreach ($daysOfWeek as $day) {
        $calendar .= "<th>$day</th>";
    }
    $calendar .= '</tr></thead><tbody><tr>';

    // Preenchimento com dias em branco antes do primeiro dia
    for ($i = 0; $i < $firstDayOfMonth; $i++) {
        $calendar .= '<td class="empty"></td>';
    }

    // Preenchimento dos dias do mês
    for ($day = 1; $day <= $daysInMonth; $day++) {
        if (($firstDayOfMonth + $day - 1) % 7 == 0 && $day != 1) {
            $calendar .= '</tr><tr>';
        }
        $calendar .= "<td>$day</td>";
    }

    // Preenchimento com dias em branco no final
    while ((($firstDayOfMonth + $daysInMonth) % 7) != 0) {
        $calendar .= '<td class="empty"></td>';
        $daysInMonth++;
    }

    $calendar .= '</tr></tbody></table>';
    return $calendar;
}

// Data atual
$currentMonth = date('m');
$currentYear = date('Y');
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Reservas de Ambientes</title>
   <style> 
  
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Arial', sans-serif;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: #f5f5f5;
    color: #333;
}

/* Cabeçalho */
header {
    background-color: #000;
    color: #fff;
    padding: 15px;
    text-align: center;
}

header h1 {
    font-size: 24px;
    font-weight: bold;
}

/* Conteúdo principal */
main {
    flex: 1;
    text-align: center;
    padding: 20px;
}

main h2 {
    font-size: 28px;
    margin-bottom: 20px;
    font-weight: bold;
}

/* Container do calendário */
.calendar-container {
    display: inline-block;
    background: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.calendar-container p {
    font-size: 16px;
    margin-bottom: 10px;
}

/* Estilização do calendário */
.calendar {
    width: 100%;
    border-collapse: collapse;
}

.calendar th {
    background-color: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
    font-weight: bold;
}

.calendar td {
    border: 1px solid #ddd;
    padding: 10px;
    text-align: center;
}

.calendar .empty {
    background-color: #f5f5f5;
}

/* Rodapé */
footer {
    text-align: center;
    background-color: #000;
    color: #fff;
    padding: 10px;
}

footer p {
    font-size: 14px;
}

   </style>
</head>
<body>
    <header>
        <h1>Desenvolvimento Web</h1>
    </header>
    <main>
        <h2>Sistema de Reservas de Ambientes</h2>
        <div class="calendar-container">
            <p><?php echo date('F \d\e Y', strtotime("$currentYear-$currentMonth-01")); ?></p>
            <?php echo generateCalendar($currentMonth, $currentYear); ?>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 - Luis Guisso</p>
    </footer>
</body>
</html>
