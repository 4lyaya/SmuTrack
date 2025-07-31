// Fungsi untuk menginisialisasi semua chart di dashboard
function initializeDashboardCharts(data) {
    // Set current date
    const dateOptions = {
        weekday: 'long',
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    };
    document.getElementById('current-date').textContent = new Date().toLocaleDateString('id-ID', dateOptions);

    // Inisialisasi Attendance Chart jika elemen ada
    if (document.querySelector("#attendanceChart")) {
        const attendanceChart = new ApexCharts(document.querySelector("#attendanceChart"), {
            chart: {
                type: 'bar',
                height: 300,
                toolbar: {
                    show: false
                }
            },
            series: [{
                name: 'Hadir',
                data: data.attendanceData.present
            }, {
                name: 'Terlambat',
                data: data.attendanceData.late
            }, {
                name: 'Tidak Hadir',
                data: data.attendanceData.absent
            }],
            xaxis: {
                categories: data.attendanceData.dates
            },
            colors: ['#3b82f6', '#f59e0b', '#ef4444'],
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    endingShape: 'rounded',
                    borderRadius: 4
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: (val) => val + " siswa"
                }
            },
            legend: {
                position: 'top',
                horizontalAlign: 'right'
            }
        });
        attendanceChart.render();
    }

    // Inisialisasi Class Distribution Chart jika elemen ada
    if (document.querySelector("#classDistributionChart")) {
        const classDistributionChart = new ApexCharts(document.querySelector("#classDistributionChart"), {
            chart: {
                type: 'donut',
                height: 300,
                toolbar: {
                    show: false
                }
            },
            series: data.classDistribution.data,
            labels: data.classDistribution.labels,
            colors: ['#3b82f6', '#10b981', '#f59e0b', '#6366f1', '#ec4899'],
            plotOptions: {
                pie: {
                    donut: {
                        size: '65%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                label: 'Total Siswa',
                                formatter: () => data.totalStudentsFormatted
                            }
                        }
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                position: 'right',
                offsetY: 0,
                height: 230,
            }
        });
        classDistributionChart.render();
    }
}