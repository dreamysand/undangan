<?php
$bulan_indonesia = [
    "January" => "Januari", "February" => "Februari", "March" => "Maret",
    "April" => "April", "May" => "Mei", "June" => "Juni",
    "July" => "Juli", "August" => "Agustus", "September" => "September",
    "October" => "Oktober", "November" => "November", "December" => "Desember"
];

// Array Nama Hari
$hari_indonesia = [
    "Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa",
    "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jumat",
    "Saturday" => "Sabtu"
];

// Ambil nama bulan & hari dalam bahasa Indonesia
$bulan = $bulan_indonesia[date("F", strtotime($acara['f_tanggal_acara']))];
$hari  = $hari_indonesia[date("l", strtotime($acara['f_tanggal_acara']))];
$tahun = date("Y", strtotime($acara['f_tanggal_acara']));
$tanggal = date("d", strtotime($acara['f_tanggal_acara']));
?>

<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $acara['f_acara'] ?></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
	  .scrollbar-none::-webkit-scrollbar {
	    display: none;
	  }

	  .scrollbar-none {
	    scrollbar-width: none;
	  }
	</style>


	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Allura&family=Faustina:ital,wght@0,300..800;1,300..800&family=GFS+Didot&family=Ibarra+Real+Nova:ital,wght@0,400..700;1,400..700&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Katibeh&display=swap" rel="stylesheet">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
</head>
<body class="relative min-h-screen flex justify-center bg-gradient-to-br from-blue-100 to-blue-300">
	<nav class="bg-[#0A2C82] shadow-lg absolute bottom-0 left-0 right-0">
        <div class="container mx-auto flex justify-between items-center p-1">
        	<a onclick="window.location.href='#cover'" class="text-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-folder"></i>
                <p>Cover</p>
            </a>
            <a onclick="window.location.href='#info'" class="text-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-info"></i>
                <p>Informasi</p>
            </a>
            <a onclick="window.location.href='#qr'" class="text-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-qrcode"></i>
                <p>Kode QR</p>
            </a>
            <a onclick="window.location.href='#location'" class="text-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-map-marker-alt"></i>
                <p>Alamat</p>
            </a>
            <a onclick="window.location.href='#gallery'" class="text-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-images"></i>
                <p>Galeri</p>
            </a>
            <a onclick="window.location.href='logout.php'" class="text-center space-x-2 text-white px-4 py-2 rounded-full shadow hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-red-300 transition duration-200">
                <i class="fas fa-door-closed"></i>
                <p>Kembali</p>
            </a>
        </div>
    </nav>
	<div class="w-[50%] h-screen bg-white overflow-scroll shadow-2xl scrollbar-none scroll-smooth">
		<div class="h-[50%] bg-[#DBE5FF] flex justify-center items-center text-center flex-col relative" id="cover">
			<h1 class="text-[clamp(2rem,4vw,5rem)] text-[#0A2C82] font-[Katibeh] my-4">JOBFAIR</h1>
			<h1 class="text-[clamp(1.5rem,3vw,3rem)] text-black font-[Ibarrarealnova] my-4">SMK Negeri 71 Jakarta</h1>
			<h1 class="text-[clamp(1.25rem,3vw,4rem)] font-bold text-[#0A2C82] font-[Inter] my-4"><?= $tahun ?></h1>
			<div class="absolute bottom-0 left-0 w-full h-[10%] bg-gradient-to-t from-white to-transparent"></div>
		</div>
		<div class="h-fit bg-white flex justify-center items-center my-9">
			<div class="w-[70%] h-[50vh]">				
				<div class="overflow-hidden bg-transparent rounded-[2rem]">
					<img src="asset/schoolview.jpg" class="w-full h-full object-cover" alt="Logo">	
				</div>
			</div>
		</div>
		<div class="h-fit bg-white flex justify-center shadow-lg w-[80%] mx-auto my-[6rem] p-4">
		  <p class="text-[clamp(1rem,1vw,1.5rem)] text-center text-black font-[Ibarrarealnova] my-5 mx-3">
		  	"Di antara langkah awal menuju masa depan yang gemilang adalah
memanfaatkan setiap peluang yang ada. SMKN 71 Jakarta dengan
bangga mengundang Anda untuk hadir di Job Fair 2025, di mana
kesempatan berharga bertemu dengan usaha keras dan talenta
Anda. Temukan pekerjaan impian Anda, kenali perusahaan-perusahaan terbaik, dan mulailah perjalanan baru menuju
kesuksesan."
		  </p>
		</div>
		<div class="h-fit bg-white flex justify-center flex-col shadow-lg border-[2px] border-[#0B31F4] rounded-lg w-[80%] mx-auto my-[6rem] p-4" id="info">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Allura] my-4 text-center">Informasi Acara</h1>
			<p class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot] my-2">
				<span class="font-semibold">Hari/Tanggal : </span><?= "$hari, $tanggal $bulan $tahun"?>
			</p>
			<p class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot] my-2">
				<span class="font-semibold">Lokasi : </span><a href="<?= $acara['f_alamat'] ?>" class="hover:text-[#0A2C82]">Klik untuk mengarah ke maps</a>
			</p>
		</div>
		<div class="h-fit bg-white flex justify-center flex-col shadow-lg border-[2px] border-[#0B31F4] rounded-lg w-[80%] mx-auto my-[6rem] p-4">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Allura] my-4 text-center">Informasi Tamu</h1>
			<p class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot] my-2">
				Id. Tamu : <?= $guest['f_id'] ?>
			</p>
			<p class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot] my-2">
				Kode Unik : <?= $guest['f_kode_unik_tamu'] ?>
			</p>
			<p class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot] my-2">
				Nama Tamu : <?= $guest['f_nama_tamu'] ?>
			</p>
			<p class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot] my-2">
				Instansi : <?= $guest['f_instansi'] ?>
			</p>
		</div>
		<div class="h-fit bg-white flex justify-center flex-col shadow-lg border-[2px] border-[#0B31F4] rounded-lg w-[80%] mx-auto my-[6rem] p-4 text-center">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Allura] my-4">Save The Date</h1>
			<div class="grid grid-cols-4 gap-1 mb-7" id="date">
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="days"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Days</h3>
				</div>
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="hours"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Hours</h3>
				</div>
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="minutes"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Mins</h3>
				</div>
				<div class="p-1">
					<h3 class="text-[clamp(0.75rem,4vw,4rem)] text-center font-[GFSDidot] font-semibold" id="seconds"></h3>
					<h3 class="text-[clamp(0.5rem,1.5vw,1.5rem)] text-center font-[GFSDidot]">Secs</h3>
				</div>
			</div>
			<div class="p-1" id="present">
				<h3 class="text-[clamp(0.75rem,4vw,3rem)] text-center font-[GFSDidot] font-semibold">Acara sedang berlangsung</h3>
			</div>
			<div class="p-1" id="finished">
				<h3 class="text-[clamp(0.75rem,4vw,3rem)] text-center font-[GFSDidot] font-semibold">Acara sudah usai</h3>
			</div>
		</div>
		<div class="h-auto bg-white flex justify-center flex-col shadow-lg border-[2px] border-[#0B31F4] rounded-lg w-[80%] mx-auto my-[6rem] p-4" id="qr">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Allura] my-4 text-center">Kode QR</h1>
			<img src="<?= $guest['f_kode_qr'] ?>" class="w-[90%] h-auto object-cover mx-auto" alt="Logo">				
		</div>
		<div class="h-auto bg-white flex justify-center flex-col shadow-lg border-[2px] border-[#0B31F4] rounded-lg w-[80%] mx-auto my-[6rem] p-4" id="location">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Allura] my-4 text-center">Alamat</h1>
			<iframe src="<?= $acara['f_embed_alamat'] ?>" class="w-[clamp(2rem,90vw,100%)] h-[clamp(2rem,90vw,20rem)]" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
		</div>
		<div class="h-auto overflow-hidden bg-white flex justify-center flex-col shadow-lg border-[2px] border-[#0B31F4] rounded-lg w-[80%] mx-auto my-[6rem] p-4" id="gallery">
			<h1 class="text-[clamp(2rem,4vw,4rem)] text-[#0A2C82] font-[Allura] my-4 text-center">Galeri</h1>
			<?php foreach ($result as $index => $galeri): ?>
				<img id="image_id<?=$galeri['f_id'] ?>" src="<?= $galeri['f_image'] ?>" class="transition-transform duration-700 ease-in-out w-full h-[80%] object-cover <?= $index === 0 ? '' : 'hidden' ?> aspect-[16/9]" alt="Logo">				
			<?php endforeach ?>
		</div>
	</div>
	<script>
		let event_date = <?= strtotime($acara['f_tanggal_acara']); ?> * 1000;
		let event_finish = <?= strtotime($acara['f_tanggal_acara_berakhir']); ?> * 1000;
		function Countdown() {
			let present_time = new Date().getTime();
			let time_difference = event_date-present_time;

			console.log(present_time);
			console.log(event_finish);
			if (time_difference>0 && event_date>present_time) {
				document.getElementById("date").classList.remove('hidden');
				document.getElementById("present").classList.add('hidden');
				document.getElementById("finished").classList.add('hidden');

				let days = Math.floor(time_difference / (1000 * 60 * 60 * 24));
				let hours = Math.floor(time_difference % (1000 * 60 * 60 * 24) / (1000 * 60 * 60));
				let minutes = Math.floor(time_difference % (1000 * 60 * 60) / (1000 * 60));
				let seconds = Math.floor(time_difference % (1000 * 60) / (1000));

				document.getElementById('days').innerText = days;
				document.getElementById('hours').innerText = hours;
				document.getElementById('minutes').innerText = minutes;
				document.getElementById('seconds').innerText = seconds;

			} else if (time_difference<0 && event_finish>present_time) {
				document.getElementById("present").classList.remove('hidden');
				document.getElementById("date").classList.add('hidden');
				document.getElementById("finished").classList.add('hidden');

			} else if (time_difference<0 && present_time>event_finish) {
				document.getElementById("finished").classList.remove('hidden');
				document.getElementById("present").classList.add('hidden');
				document.getElementById("date").classList.add('hidden');
			}
		}

		let interval = setInterval(Countdown, 1000);
		Countdown();

		let imageId = [
		<?php foreach ($result as $galeri): ?>
			"image_id<?=$galeri['f_id']?>",
		<?php endforeach ?>
		]
		let currentIndex = 0;
		function CarouselMove() {
			document.getElementById(imageId[currentIndex]).classList.add("hidden");

			currentIndex = (currentIndex + 1) % imageId.length;

			document.getElementById(imageId[currentIndex]).classList.remove("hidden");
		}
		let intervalNazi = setInterval(CarouselMove, 5000);
	</script>
</body>
</html>