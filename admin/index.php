
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Admin Dashboard - for admins only">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/fd784d3edb.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-900 text-white min-h-screen font-montserrat">
    <!-- Header -->
    <header class="bg-gray-800 shadow-lg px-6 py-4">
        <div class="flex justify-between items-center">
            <div class="text-2xl font-bold">DASHBOARD</div>
            <nav class="flex space-x-6">
                <a href="../login.html" class="bg-red-600 px-4 py-2 rounded-lg hover:bg-red-700 transition">Logout</a>
            </nav>
        </div>
    </header>

    <div class="flex flex-1">
        <!-- Sidebar -->
        <nav class="w-64 bg-gray-800 p-8 flex flex-col gap-12 hidden lg:flex">
            <h2 class="text-xl font-bold text-center">My Admin</h2>
            <div class="flex flex-col space-y-4">
                <a href="index.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fa-solid fa-grip text-blue-400"></i>
                    <span>Dashboard</span>
                </a>
                <a href="../public/patients.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fa-solid fa-user-md text-green-400"></i>
                    <span>Patients</span>
                </a>
                <a href="../public/doctors.php" class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fa-solid fa-stethoscope text-purple-400"></i>
                    <span>Doctors</span>
                </a>
                <a href="../public/departments.php"
                    class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fa-solid fa-building text-yellow-400"></i>
                    <span>Departments</span>
                </a>
                <a href="../public/appointments.php"
                    class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fa-solid fa-calendar-check text-blue-400"></i>
                    <span>Appointments</span>
                </a>
                <a href="../public/medications.php"
                    class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fa-solid fa-capsules text-yellow-400"></i>
                    <span>Medications</span>
                </a>
                <a href="../public/prescriptions.php"
                    class="flex items-center space-x-3 p-3 rounded-lg hover:bg-gray-700 transition">
                    <i class="fa-solid fa-prescription-bottle text-purple-400"></i>
                    <span>Prescriptions</span>
                </a>
            </div>
            <button
                class="bg-red-600 text-white px-6 py-2 rounded-lg hover:bg-red-700 transition mt-auto">Logout</button>
        </nav>

        <!-- Main Content -->
        <main class="flex-1 p-8 overflow-y-scroll min-h-">
            <!-- Stats Cards -->
            <section class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-12">
                <div class="bg-gray-800 border border-gray-600 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all duration-300 flex items-center gap-4">
                    <i class="fa-solid fa-user-md text-green-400"></i>
                    <div>
                        <p class="text-sm font-medium text-gray-400 mb-1">Total Patients</p>
                        <p class="text-2xl font-bold"><?= htmlspecialchars($totalPatients) ?></p>
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-600 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all duration-300 flex items-center gap-4">
                    <i class="fa-solid fa-stethoscope text-purple-400"></i>
                    <div>
                        <p class="text-sm font-medium text-gray-400 mb-1">Total Doctors</p>
                        <p class="text-2xl font-bold"><?= htmlspecialchars($totalDoctors) ?></p>
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-600 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all duration-300 flex items-center gap-4">
                    <i class="fa-solid fa-building text-yellow-400"></i>
                    <div>
                        <p class="text-sm font-medium text-gray-400 mb-1">Total Departments</p>
                        <p class="text-2xl font-bold"><?= htmlspecialchars($totalDepartments) ?></p>
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-600 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all duration-300 flex items-center gap-4">
                    <i class="fa-solid fa-prescription-bottle text-purple-400"></i>
                    <div>
                        <p class="text-sm font-medium text-gray-400 mb-1">Total Prescriptions</p>
                        <p class="text-2xl font-bold"><?= htmlspecialchars($totalprescriptions) ?></p>
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-600 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all duration-300 flex items-center gap-4">
                    <i class="fa-solid fa-calendar-check text-blue-400"></i>
                    <div>
                        <p class="text-sm font-medium text-gray-400 mb-1">Total Apointments</p>
                        <p class="text-2xl font-bold"><?= htmlspecialchars($totalAppointments) ?></p>
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-600 rounded-xl p-6 hover:border-blue-500 hover:shadow-lg transition-all duration-300 flex items-center gap-4">
                    <i class="fa-solid fa-capsules text-yellow-400"></i>
                    <div>
                        <p class="text-sm font-medium text-gray-400 mb-1">Total Medications</p>
                        <p class="text-2xl font-bold"><?= htmlspecialchars($totalmedications) ?></p>
                    </div>
                </div>
            </section>

            <!-- Status Table -->
            <section class="bg-gray-800/40 backdrop-blur-sm border border-gray-600 rounded-xl p-6">
                <h3 class="text-xl font-bold mb-6">Status</h3>
                <div class="overflow-x-auto">
                    <canvas id="myChart"></canvas>
                </div>
            </section>
        </main>
    </div>

    <!-- Footer -->
    <footer class="bg-gray-800 border-t border-gray-700 py-4 text-center text-sm">
        <p>2025 © My Admin Dashboard. All rights reserved.</p>
    </footer>

   <script>
    tailwind.config = {
        theme: {
            extend: {
                fontFamily: {
                    'montserrat': ['Montserrat', 'sans-serif']
                }
            }
        }
    }
   
    const ctx = document.getElementById('myChart');

    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Patient', 'Doctor', 'Department', 'Appointments', 'Medications', 'Prescriptions'],
            datasets: [{
                label: 'Total',
                data: [
                    <?php echo $totalPatients; ?>,
                    <?php echo $totalDoctors; ?>,
                    <?php echo $totalDepartments; ?>,
                    <?php echo $totalAppointments; ?>,
                    <?php echo $totalmedications; ?>,
                    <?php echo $totalprescriptions; ?>
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

</body>
</html>


