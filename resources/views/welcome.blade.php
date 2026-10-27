<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestión de Citas Médicas</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-slate-50 text-slate-800 min-h-screen flex flex-col items-center justify-center p-6">
    <div class="max-w-4xl w-full bg-white rounded-2xl shadow-xl border border-slate-100 p-8 md:p-12 text-center">
        <div class="inline-block p-4 bg-blue-50 text-blue-600 rounded-2xl mb-4 text-4xl">🏥</div>
        <h1 class="text-3xl font-bold tracking-tight text-slate-900 mb-2">Sistema de Gestión de Citas Médicas</h1>
        <p class="text-slate-500 mb-8">Panel de control principal. Seleccione el módulo que desea gestionar:</p>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 text-left">
            <a href="/especialidades" class="group p-5 bg-slate-50 hover:bg-blue-600 rounded-xl border border-slate-200 hover:border-blue-600 transition-all duration-200 flex items-center space-x-4 shadow-sm">
                <span class="text-3xl p-3 bg-white rounded-lg shadow-sm group-hover:bg-blue-500 transition">🩺</span>
                <div>
                    <h2 class="font-semibold text-slate-900 group-hover:text-white">Especialidades</h2>
                    <p class="text-xs text-slate-500 group-hover:text-blue-100">Catálogo médico</p>
                </div>
            </a>

            <a href="/medicos" class="group p-5 bg-slate-50 hover:bg-blue-600 rounded-xl border border-slate-200 hover:border-blue-600 transition-all duration-200 flex items-center space-x-4 shadow-sm">
                <span class="text-3xl p-3 bg-white rounded-lg shadow-sm group-hover:bg-blue-500 transition">👨‍⚕️</span>
                <div>
                    <h2 class="font-semibold text-slate-900 group-hover:text-white">Médicos</h2>
                    <p class="text-xs text-slate-500 group-hover:text-blue-100">Doctores y estados</p>
                </div>
            </a>

            <a href="/pacientes" class="group p-5 bg-slate-50 hover:bg-blue-600 rounded-xl border border-slate-200 hover:border-blue-600 transition-all duration-200 flex items-center space-x-4 shadow-sm">
                <span class="text-3xl p-3 bg-white rounded-lg shadow-sm group-hover:bg-blue-500 transition">🧑‍🦱</span>
                <div>
                    <h2 class="font-semibold text-slate-900 group-hover:text-white">Pacientes</h2>
                    <p class="text-xs text-slate-500 group-hover:text-blue-100">Expedientes y registros</p>
                </div>
            </a>

            <a href="/consultorios" class="group p-5 bg-slate-50 hover:bg-blue-600 rounded-xl border border-slate-200 hover:border-blue-600 transition-all duration-200 flex items-center space-x-4 shadow-sm">
                <span class="text-3xl p-3 bg-white rounded-lg shadow-sm group-hover:bg-blue-500 transition">🚪</span>
                <div>
                    <h2 class="font-semibold text-slate-900 group-hover:text-white">Consultorios</h2>
                    <p class="text-xs text-slate-500 group-hover:text-blue-100">Salas y ubicaciones</p>
                </div>
            </a>

            <a href="/citas" class="group p-5 bg-slate-50 hover:bg-blue-600 rounded-xl border border-slate-200 hover:border-blue-600 transition-all duration-200 flex items-center space-x-4 shadow-sm md:col-span-2 lg:col-span-2">
                <span class="text-3xl p-3 bg-white rounded-lg shadow-sm group-hover:bg-blue-500 transition">📅</span>
                <div>
                    <h2 class="font-semibold text-slate-900 group-hover:text-white">Citas Médicas</h2>
                    <p class="text-xs text-slate-500 group-hover:text-blue-100">Agenda, programación y validación de empalmes</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>