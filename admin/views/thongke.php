<div class="p-5">
    <div class="row">
        <canvas id="barChart"></canvas>
    </div>
    <div class="row">
        <canvas id="barChart2"></canvas>
    </div>
</div>
<?php
include("../config/connectDatabase.php");

// Truy vấn dữ liệu từ bảng Orders và Category
$sql = "SELECT c.name, SUM(o.quantity) AS total FROM Orders od
            JOIN Orderdetail o ON od.id = o.orderid
            JOIN Product p ON o.productid = p.id
            JOIN Category c ON p.categoryid = c.id
            WHERE od.status = 4
            GROUP BY p.categoryid";
$result = $conn->query($sql);

// Tạo mảng dữ liệu cho biểu đồ cột
$barData = [
    'labels' => [],
    'data' => [],
    'backgroundColor' => 'rgba(54, 162, 235, 0.8)',
    'borderColor' => 'rgba(54, 162, 235, 1)',
    'borderWidth' => 1
];

// Lặp qua kết quả truy vấn và lấy dữ liệu
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $barData['labels'][] = $row['name'];
        $barData['data'][] = $row['total'];
    }
}


// Truy vấn dữ liệu từ bảng OrderDetail
$sql = "SELECT YEAR(od.created_at) AS year, MONTH(od.created_at) AS month, SUM(o.price * o.quantity) AS revenue
FROM Orders od
JOIN Orderdetail o ON od.id = o.orderid
JOIN Product p ON o.productid = p.id
WHERE od.status = 4
GROUP BY YEAR(od.created_at), MONTH(od.created_at)
ORDER BY YEAR(od.created_at), MONTH(od.created_at)";
$result = $conn->query($sql);

// Tạo mảng dữ liệu cho biểu đồ cột
$barLabels = [];
$barData2 = [];
$barColors = []; // Mảng chứa các màu sắc cho từng cột

// Mảng màu sắc cho từng cột (ví dụ)
$colors = ['rgba(54, 162, 235, 0.5)', 'rgba(255, 99, 132, 0.5)', 'rgba(75, 192, 192, 0.5)', 'rgba(255, 206, 86, 0.5)', 'rgba(153, 102, 255, 0.5)'];

// Lặp qua kết quả truy vấn và lấy dữ liệu
if ($result->num_rows > 0) {
    $i = 0;
    while ($row = $result->fetch_assoc()) {
        $barLabels[] = $row['month'] . '/' . $row['year'];
        $barData2[] = $row['revenue'];
        $barColors[] = $colors[$i % count($colors)]; // Chọn màu sắc theo thứ tự và lặp lại khi hết màu
        $i++;
    }
}

?>

<script>
    // Biểu đồ cột
    var barData = {
        labels: <?php echo json_encode($barData['labels']); ?>,
        datasets: [{
            label: 'Doanh số bán hàng',
            data: <?php echo json_encode($barData['data']); ?>,
            backgroundColor: '<?php echo $barData['backgroundColor']; ?>',
            borderColor: '<?php echo $barData['borderColor']; ?>',
            borderWidth: <?php echo $barData['borderWidth']; ?>
        }]
    };

    var barOptions = {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true,
                ticks: {
                    precision: 0
                }
            }
        },
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Doanh số bán hàng theo Danh mục',
                font: {
                    size: 18,
                    weight: 'bold'
                }
            }
        }
    };

    var barCtx = document.getElementById('barChart').getContext('2d');
    new Chart(barCtx, {
        type: 'bar',
        data: barData,
        options: barOptions
    });



    // Biểu đồ cột
    var barChart2 = new Chart(document.getElementById('barChart2'), {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($barLabels); ?>,
            datasets: [{
                label: 'Doanh thu (VNĐ)',
                data: <?php echo json_encode($barData2); ?>,
                backgroundColor: <?php echo json_encode($barColors); ?>,
                borderColor: '<?php echo $barColors[0]; ?>',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function (value, index, values) {
                            return value.toLocaleString() + ' VNĐ';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                title: {
                    display: true,
                    text: 'Doanh thu theo tháng',
                    font: {
                        size: 18,
                        weight: 'bold'
                    }
                }
            }
        }
    });
</script>