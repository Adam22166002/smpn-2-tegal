<div id="offlinrModal" class="modal-container fixed inset-0 bg-black bg-opacity-50 hidden z-50">
    <div class="flex items-center justify-center min-h-screen px-4">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md">
            <div class="p-6">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-xl font-bold">Form Appointment Offline</h3>
                    <button onclick="closeModal('offlineModal')" class="text-gray-500 hover:text-gray-700">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>

                <form action="{{ route('bk-appointment.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <input type="hidden" name="type" value="offline">
                    
                    <div>
                        <label class="block text-gray-700 mb-2">Nama <span class="text-red-500">*</span></label>
                        <input type="text" name="name" required class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Kelas <span class="text-red-500">*</span></label>
                        <select name="class" required class="w-full border rounded-lg px-3 py-2">
                            <option value="">Pilih Kelas</option>
                            @for($i = 10; $i <= 12; $i++)
                                @foreach(['A', 'B', 'C', 'D'] as $class)
                                    <option value="{{ $i . $class }}">{{ $i . $class }}</option>
                                @endforeach
                            @endfor
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Nomor WhatsApp <span class="text-red-500">*</span></label>
                        <input type="tel" name="phone" required 
                               class="w-full border rounded-lg px-3 py-2"
                               placeholder="628xxxxxxxxxx">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Tanggal Konsultasi <span class="text-red-500">*</span></label>
                        <input type="date" name="appointment_date" required 
                               min="{{ date('Y-m-d') }}"
                               class="w-full border rounded-lg px-3 py-2">
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Waktu Konsultasi <span class="text-red-500">*</span></label>
                        <select name="appointment_time" required class="w-full border rounded-lg px-3 py-2">
                            <option value="">Pilih Waktu</option>
                            @foreach(['09:00', '10:00', '11:00', '13:00', '14:00', '15:00'] as $time)
                                <option value="{{ $time }}">{{ $time }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Topik Konsultasi <span class="text-red-500">*</span></label>
                        <select name="consultation_topic" required class="w-full border rounded-lg px-3 py-2">
                            <option value="">Pilih Topik</option>
                            <option value="academic">Akademik</option>
                            <option value="career">Karir</option>
                            <option value="personal">Pribadi</option>
                            <option value="social">Sosial</option>
                            <option value="other">Lainnya</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Deskripsi Singkat</label>
                        <textarea name="description" rows="3" 
                                class="w-full border rounded-lg px-3 py-2"
                                placeholder="Jelaskan secara singkat apa yang ingin dikonsultasikan..."></textarea>
                    </div>

                    <div>
                        <label class="block text-gray-700 mb-2">Guru BK yang Dituju (Opsional)</label>
                        <select name="counselor" class="w-full border rounded-lg px-3 py-2">
                            <option value="">Pilih Guru BK</option>
                            <option value="1">Bu Ani</option>
                            <option value="2">Pak Budi</option>
                            <option value="3">Bu Citra</option>
                        </select>
                    </div>

                    <div class="flex justify-end space-x-3">
                        <button type="button" onclick="closeModal('offlineModal')"
                                class="px-4 py-2 border rounded-lg text-gray-600 hover:bg-gray-100">
                            Batal
                        </button>
                        <button type="submit"
                                class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                            Buat Janji
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>