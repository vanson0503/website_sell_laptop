<div class="row">
    <div class="col-lg-6">
        <canvas id="pieChart"></canvas>
    </div>
    <div class="col-lg-6">
        <canvas id="pieChart2"></canvas>
    </div>

</div>

<?php
include("../config/connectDatabase.php");
// Truy vấn dữ liệu từ bảng Product và Category
$sql = "SELECT c.name, COUNT(*) AS total FROM Product p
            JOIN Category c ON p.categoryid = c.id
            GROUP BY p.categoryid";
$result = mysqli_query($conn, $sql);

// Tạo mảng dữ liệu cho biểu đồ hình tròn
$pieData = [
    'labels' => [],
    'data' => [],
    'backgroundColor' => [
        'rgba(255, 99, 132, 0.8)',
        'rgba(54, 162, 235, 0.8)',
        'rgba(255, 205, 86, 0.8)',
        'rgba(75, 192, 192, 0.8)',
        'rgba(153, 102, 255, 0.8)'
    ],
    'borderColor' => 'rgba(255, 255, 255, 1)',
    'borderWidth' => 1
];

// Lặp qua kết quả truy vấn và lấy dữ liệu
if (mysqli_num_rows($result)) {
    while ($row = mysqli_fetch_assoc($result)) {
        $pieData['labels'][] = $row['name'];
        $pieData['data'][] = $row['total'];
    }
}

// Truy vấn dữ liệu từ bảng Product và Brand
$sql = "SELECT b.name AS brand, COUNT(p.id) AS product_count
FROM Product p
JOIN Brand b ON p.brandid = b.id
GROUP BY p.brandid";
$result = $conn->query($sql);

// Tạo mảng dữ liệu cho biểu đồ tròn
$pieLabels = [];
$pieData2 = [];

// Lặp qua kết quả truy vấn và lấy dữ liệu
if ($result->num_rows > 0) {
while ($row = $result->fetch_assoc()) {
    $pieLabels[] = $row['brand'];
    $pieData2[] = $row['product_count'];
}
}

?>

<script>
    // Biểu đồ hình tròn
    var pieData = {
        labels: <?php echo json_encode($pieData['labels']); ?>,
        datasets: [{
            data: <?php echo json_encode($pieData['data']); ?>,
            backgroundColor: <?php echo json_encode($pieData['backgroundColor']); ?>,
            borderColor: '<?php echo $pieData['borderColor']; ?>',
            borderWidth: <?php echo $pieData['borderWidth']; ?>
        }]
    };

    var pieOptions = {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'right'
            },
            title: {
                display: true,
                text: 'Số lượng sản phẩm theo Danh mục',
                font: {
                    size: 18,
                    weight: 'bold'
                }
            }
        }
    };

    var pieCtx = document.getElementById('pieChart').getContext('2d');
    new Chart(pieCtx, {
        type: 'doughnut',
        data: pieData,
        options: pieOptions
    });

    // Biểu đồ tròn
    var pieChart2 = new Chart(document.getElementById('pieChart2'), {
            type: 'pie',
            data: {
                labels: <?php echo json_encode($pieLabels); ?>,
                datasets: [{
                    data: <?php echo json_encode($pieData2); ?>,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)'
                    ],
                    borderColor: 'rgba(255, 255, 255, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 10
                        }
                    },
                    title: {
                        display: true,
                        text: 'Số lượng sản phẩm theo nhãn hiệu',
                        font: {
                            size: 18,
                            weight: 'bold'
                        }
                    }
                }
            }
        });
</script>