document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById("myChart");
    if (ctx) {
        new Chart(ctx, {
            type: "bar",
            options: {
                animation: false,
                plugins: {
                    legend: {
                        display: false,
                    },
                    tooltip: {
                        enabled: false,
                    },
                },
            },
            data: {
                labels: ["2021", "2022", "2023"], // Data statis
                datasets: [
                    {
                        label: "Acquisitions by year",
                        data: [10, 20, 30], // Data statis
                    },
                ],
            },
        });
    }
});
