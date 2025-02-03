@extends('layouts.Frontend.app')

@section('title')
    Layanan BK
@endsection

@section('content')
    @section('about')
        <!-- hero section-->
        <div class="relative bg-gradient-to-r from-blue-600 to-blue-800 text-white">
            <div class="absolute inset-0">
                <img src="/api/placeholder/1920/600" alt="Background" class="w-full h-full object-cover mix-blend-overlay opacity-20">
            </div>
            <div class="relative container mx-auto px-4 py-24">
                <div class="max-w-3xl">
                    <h1 class="text-5xl font-bold mb-6 font-sans">Layanan Bimbingan Konseling</h1>
                    <p class="text-xl mb-8 leading-relaxed">Kami hadir untuk mendukung pengembangan diri dan kesejahteraan mental Anda. Konsultasikan setiap masalah Anda dengan tim BK yang profesional dan terpercaya.</p>
                    <div class="flex gap-4">
                        <button onclick="document.getElementById('layanan').scrollIntoView({behavior: 'smooth'})" 
                                class="bg-white text-blue-600 px-8 py-3 rounded-full font-semibold hover:bg-blue-50 transition">
                            Mulai Konsultasi
                        </button>
                        <button onclick="document.getElementById('info').scrollIntoView({behavior: 'smooth'})" 
                                class="bg-transparent border-2 border-white px-8 py-3 rounded-full font-semibold hover:bg-white hover:text-blue-600 transition">
                            Pelajari Lebih Lanjut
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- status section -->
        <div class="bg-white py-12">
            <div class="container mx-auto px-4">
                <div class="grid md:grid-cols-4 gap-8 text-center">
                    <div class="p-6">
                        <div class="text-3xl font-bold text-blue-600 mb-2">1000+</div>
                        <div class="text-gray-600">Siswa Terlayani</div>
                    </div>
                    <div class="p-6">
                        <div class="text-3xl font-bold text-blue-600 mb-2">24/7</div>
                        <div class="text-gray-600">Dukungan Online</div>
                    </div>
                    <div class="p-6">
                        <div class="text-3xl font-bold text-blue-600 mb-2">98%</div>
                        <div class="text-gray-600">Tingkat Kepuasan</div>
                    </div>
                    <div class="p-6">
                        <div class="text-3xl font-bold text-blue-600 mb-2">5+</div>
                        <div class="text-gray-600">Konselor Profesional</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- informasi section -->
        <div id="info" class="bg-gray-50 py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Mengapa Memilih Layanan BK Kami?</h2>
                    <p class="text-gray-600">Kami menyediakan layanan konseling profesional dengan pendekatan yang komprehensif untuk membantu Anda mencapai potensi terbaik.</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:-translate-y-1">
                        <div class="h-48 bg-blue-100 flex items-center justify-center">
                            <img src="/api/placeholder/400/300" alt="Kerahasiaan" class="w-32">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3">Kerahasiaan Terjamin</h3>
                            <p class="text-gray-600">Kami menjunjung tinggi privasi dan kerahasiaan setiap konsultasi yang Anda lakukan.</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:-translate-y-1">
                        <div class="h-48 bg-green-100 flex items-center justify-center">
                            <img src="/api/placeholder/400/300" alt="Profesional" class="w-32">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3">Konselor Profesional</h3>
                            <p class="text-gray-600">Tim konselor kami terdiri dari profesional berpengalaman dengan sertifikasi resmi.</p>
                        </div>
                    </div>
                    
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-transform hover:-translate-y-1">
                        <div class="h-48 bg-purple-100 flex items-center justify-center">
                            <img src="/api/placeholder/400/300" alt="Fleksibel" class="w-32">
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-3">Fleksibilitas Konsultasi</h3>
                            <p class="text-gray-600">Pilih metode konsultasi yang sesuai dengan kebutuhan Anda, baik online maupun offline.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- jenis layanan Section -->
        <div id="layanan" class="py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto text-center mb-12">
                    <h2 class="text-3xl font-bold mb-4">Pilih Layanan Sesuai Kebutuhan Anda</h2>
                    <p class="text-gray-600">Kami menyediakan berbagai jenis layanan untuk membantu menyelesaikan masalah Anda</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all hover:shadow-xl">
                        <div class="h-48 bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center p-8">
                            <img src="/api/placeholder/300/300" alt="Notes" class="w-32">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-3 text-blue-600">Pengaduan Notes</h3>
                            <p class="text-gray-600 mb-6">Sampaikan keluh kesah atau masalah Anda secara tertulis. Pilihan sempurna untuk yang lebih nyaman mengungkapkan masalah secara tekstual.</p>
                            <button onclick="document.getElementById('notesModal').classList.remove('hidden')" 
                                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-blue-700 transition">
                                Buat Pengaduan
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all hover:shadow-xl">
                        <div class="h-48 bg-gradient-to-br from-green-500 to-green-600 flex items-center justify-center p-8">
                            <img src="/api/placeholder/300/300" alt="Online" class="w-32">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-3 text-green-600">Konsultasi Online</h3>
                            <p class="text-gray-600 mb-6">Konsultasi virtual melalui platform pilihan Anda. Solusi praktis untuk mendapatkan bimbingan dari mana saja.</p>
                            <button onclick="document.getElementById('onlineModal').classList.remove('hidden')" 
                                    class="w-full bg-green-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-green-700 transition">
                                Buat Janji Online
                            </button>
                        </div>
                    </div>

                    <div class="bg-white rounded-xl shadow-lg overflow-hidden transition-all hover:shadow-xl">
                        <div class="h-48 bg-gradient-to-br from-purple-500 to-purple-600 flex items-center justify-center p-8">
                            <img src="/api/placeholder/300/300" alt="Offline" class="w-32">
                        </div>
                        <div class="p-6">
                            <h3 class="text-2xl font-bold mb-3 text-purple-600">Konsultasi Tatap Muka</h3>
                            <p class="text-gray-600 mb-6">Konsultasi langsung dengan konselor di ruang konseling yang nyaman dan private.</p>
                            <button onclick="document.getElementById('offlineModal').classList.remove('hidden')" 
                                    class="w-full bg-purple-600 text-white py-3 px-6 rounded-lg font-semibold hover:bg-purple-700 transition">
                                Buat Janji Offline
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- faq section -->
        <div class="bg-gray-50 py-16">
            <div class="container mx-auto px-4">
                <div class="max-w-3xl mx-auto">
                    <h2 class="text-3xl font-bold mb-8 text-center">Pertanyaan Yang Sering Diajukan</h2>
                    <div class="space-y-4">
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="font-bold mb-2">Apakah layanan konseling ini berbayar?</h3>
                            <p class="text-gray-600">Tidak, semua layanan konseling BK sekolah diberikan secara gratis untuk seluruh siswa.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="font-bold mb-2">Berapa lama waktu konsultasi yang diberikan?</h3>
                            <p class="text-gray-600">Setiap sesi konsultasi berlangsung sekitar 45-60 menit.</p>
                        </div>
                        <div class="bg-white rounded-lg shadow-md p-6">
                            <h3 class="font-bold mb-2">Apakah saya bisa memilih konselor?</h3>
                            <p class="text-gray-600">Ya, Anda dapat memilih konselor yang Anda inginkan saat membuat janji konsultasi offline.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- modal -->
        @include('frontend.bk-complaint.notes-modal')
        @include('frontend.bk-complaint.online-modal')
        @include('frontend.bk-complaint.offline-modal')

            <style>
                @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap');
                
                body {
                    font-family: 'Inter', sans-serif;
                }
            </style>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                // Close modal when clicking outside
                window.onclick = function(event) {
                    const modals = document.getElementsByClassName('modal-container');
                    Array.from(modals).forEach(modal => {
                        if (event.target == modal) {
                            modal.classList.add('hidden');
                        }
                    });
                }

                // Close modal with escape key
                document.addEventListener('keydown', function(event) {
                    if (event.key === "Escape") {
                        const modals = document.getElementsByClassName('modal-container');
                        Array.from(modals).forEach(modal => {
                            modal.classList.add('hidden');
                        });
                    }
                });
            });

            function openModal(modalId) {
                document.getElementById(modalId).classList.remove('hidden');
            }

            function closeModal(modalId) {
                document.getElementById(modalId).classList.add('hidden');
            }
        </script>
    @endsection
@endsection