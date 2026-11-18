<?php

namespace App\Http\Controllers\Data;

class DummyData
{
    public static function idols(): array
    {
        return [
            ['id'=>1,'nama'=>'Jungkook','grup'=>'BTS','agensi'=>'HYBE','posisi'=>'Main Vocalist','foto'=>'https://i.pravatar.cc/400?img=12','followers'=>'52.3M','trending'=>true],
            ['id'=>2,'nama'=>'Lisa','grup'=>'BLACKPINK','agensi'=>'YG','posisi'=>'Main Dancer','foto'=>'https://i.pravatar.cc/400?img=47','followers'=>'98.1M','trending'=>true],
            ['id'=>3,'nama'=>'Wonyoung','grup'=>'IVE','agensi'=>'Starship','posisi'=>'Center','foto'=>'https://i.pravatar.cc/400?img=44','followers'=>'15.2M','trending'=>true],
            ['id'=>4,'nama'=>'Hoshi','grup'=>'SEVENTEEN','agensi'=>'Pledis','posisi'=>'Main Dancer','foto'=>'https://i.pravatar.cc/400?img=33','followers'=>'12.4M','trending'=>false],
            ['id'=>5,'nama'=>'Karina','grup'=>'aespa','agensi'=>'SM','posisi'=>'Leader','foto'=>'https://i.pravatar.cc/400?img=45','followers'=>'21.8M','trending'=>true],
            ['id'=>6,'nama'=>'Felix','grup'=>'Stray Kids','agensi'=>'JYP','posisi'=>'Dancer','foto'=>'https://i.pravatar.cc/400?img=15','followers'=>'18.9M','trending'=>false],
        ];
    }

    public static function groups(): array
    {
        return [
            ['id'=>1,'nama'=>'BTS','agensi'=>'HYBE','debut'=>'2013','member'=>7,'logo'=>'https://i.pravatar.cc/200?img=1','warna'=>'from-purple-500 to-pink-500','genre'=>'K-Pop, Hip-Hop'],
            ['id'=>2,'nama'=>'BLACKPINK','agensi'=>'YG','debut'=>'2016','member'=>4,'logo'=>'https://i.pravatar.cc/200?img=5','warna'=>'from-pink-500 to-rose-500','genre'=>'K-Pop, EDM'],
            ['id'=>3,'nama'=>'SEVENTEEN','agensi'=>'Pledis','debut'=>'2015','member'=>13,'logo'=>'https://i.pravatar.cc/200?img=7','warna'=>'from-blue-500 to-cyan-500','genre'=>'K-Pop, Pop'],
            ['id'=>4,'nama'=>'IVE','agensi'=>'Starship','debut'=>'2021','member'=>6,'logo'=>'https://i.pravatar.cc/200?img=9','warna'=>'from-rose-500 to-orange-400','genre'=>'K-Pop, Dance'],
            ['id'=>5,'nama'=>'aespa','agensi'=>'SM','debut'=>'2020','member'=>4,'logo'=>'https://i.pravatar.cc/200?img=10','warna'=>'from-cyan-400 to-blue-600','genre'=>'K-Pop, Electronic'],
            ['id'=>6,'nama'=>'Stray Kids','agensi'=>'JYP','debut'=>'2018','member'=>8,'logo'=>'https://i.pravatar.cc/200?img=11','warna'=>'from-red-500 to-orange-500','genre'=>'K-Pop, Hip-Hop'],
        ];
    }

    public static function posts(): array
    {
        return [
            ['id'=>1,'user'=>'Rina','avatar'=>'https://i.pravatar.cc/100?img=44','waktu'=>'2 jam lalu','grup'=>'BTS','isi'=>'Comeback BTS tahun ini beneran masterpiece! Lagu barunya nggak bisa berhenti di-repeat 🎵','likes'=>234,'comments'=>45,'image'=>'https://picsum.photos/seed/bts1/600/400'],
            ['id'=>2,'user'=>'Dimas','avatar'=>'https://i.pravatar.cc/100?img=15','waktu'=>'5 jam lalu','grup'=>'SEVENTEEN','isi'=>'Fanart Hoshi hari ini, semoga suka! 🐯💜','likes'=>512,'comments'=>78,'image'=>'https://picsum.photos/seed/svt1/600/400'],
            ['id'=>3,'user'=>'Sari','avatar'=>'https://i.pravatar.cc/100?img=45','waktu'=>'1 hari lalu','grup'=>'BLACKPINK','isi'=>'Konser BLACKPINK di Jakarta beneran epic. Siapa yang datang? 🙋‍♀️','likes'=>891,'comments'=>156,'image'=>null],
            ['id'=>4,'user'=>'Budi','avatar'=>'https://i.pravatar.cc/100?img=33','waktu'=>'1 hari lalu','grup'=>'aespa','isi'=>'Karina visualnya unreal banget hari ini 😭✨','likes'=>345,'comments'=>67,'image'=>'https://picsum.photos/seed/aespa/600/400'],
            ['id'=>5,'user'=>'Nina','avatar'=>'https://i.pravatar.cc/100?img=47','waktu'=>'2 hari lalu','grup'=>'IVE','isi'=>'Wonyoung outfit analysis thread 🧵👇','likes'=>678,'comments'=>89,'image'=>null],
        ];
    }

    public static function news(): array
    {
        return [
            ['id'=>1,'judul'=>'BTS Umumkan Comeback Album Baru 2027','kategori'=>'Comeback','tanggal'=>'2026-11-18','grup'=>'BTS','image'=>'https://picsum.photos/seed/news1/600/400','ringkasan'=>'Big Hit Music konfirmasi album baru BTS akan rilis awal 2027 dengan konsep yang berbeda.'],
            ['id'=>2,'judul'=>'BLACKPINK World Tour Jakarta 2026','kategori'=>'Konser','tanggal'=>'2026-11-17','grup'=>'BLACKPINK','image'=>'https://picsum.photos/seed/news2/600/400','ringkasan'=>'BLACKPINK akan menggelar konser di Gelora Bung Karno pada 15 Desember 2026.'],
            ['id'=>3,'judul'=>'SEVENTEEN Rilis Mini Album ke-12','kategori'=>'Comeback','tanggal'=>'2026-11-16','grup'=>'SEVENTEEN','image'=>'https://picsum.photos/seed/news3/600/400','ringkasan'=>'Pledis Entertainment mengumumkan mini album baru SEVENTEEN dengan 6 lagu original.'],
            ['id'=>4,'judul'=>'aespa Tampil di Coachella 2027','kategori'=>'Konser','tanggal'=>'2026-11-15','grup'=>'aespa','image'=>'https://picsum.photos/seed/news4/600/400','ringkasan'=>'aespa dikonfirmasi jadi lineup Coachella 2027, grup K-Pop ketiga yang tampil.'],
            ['id'=>5,'judul'=>'Stray Kids Cetak Rekor Billboard 200','kategori'=>'Berita','tanggal'=>'2026-11-14','grup'=>'Stray Kids','image'=>'https://picsum.photos/seed/news5/600/400','ringkasan'=>'Album terbaru Stray Kids debut #1 Billboard 200 selama 3 minggu berturut-turut.'],
            ['id'=>6,'judul'=>'IVE Umumkan Tur Asia 2027','kategori'=>'Konser','tanggal'=>'2026-11-13','grup'=>'IVE','image'=>'https://picsum.photos/seed/news6/600/400','ringkasan'=>'Starship Entertainment mengumumkan tur Asia IVE mencakup 12 kota.'],
        ];
    }

    public static function comebacks(): array
    {
        return [
            ['tanggal'=>'2026-11-20','grup'=>'BTS','judul'=>'Butterfly Effect','type'=>'Album'],
            ['tanggal'=>'2026-11-25','grup'=>'BLACKPINK','judul'=>'Born Pink 2','type'=>'Single'],
            ['tanggal'=>'2026-12-01','grup'=>'IVE','judul'=>'IVE SWITCH','type'=>'Mini Album'],
            ['tanggal'=>'2026-12-05','grup'=>'SEVENTEEN','judul'=>'FML: Reborn','type'=>'Album'],
            ['tanggal'=>'2026-12-10','grup'=>'aespa','judul'=>'Drama','type'=>'Single'],
        ];
    }

    public static function trending(): array
    {
        return [
            ['rank'=>1,'judul'=>'Butterfly Effect','artist'=>'BTS','change'=>'+2'],
            ['rank'=>2,'judul'=>'Born Pink 2','artist'=>'BLACKPINK','change'=>'0'],
            ['rank'=>3,'judul'=>'Super','artist'=>'SEVENTEEN','change'=>'-1'],
            ['rank'=>4,'judul'=>'Drama','artist'=>'aespa','change'=>'+3'],
            ['rank'=>5,'judul'=>'HEYA','artist'=>'IVE','change'=>'-2'],
        ];
    }

    public static function gallery(): array
    {
        return [
            ['id'=>1,'judul'=>'Jungkook Purple Era','grup'=>'BTS','kategori'=>'Photocard','image'=>'https://picsum.photos/seed/gal1/600/700','author'=>'Rina'],
            ['id'=>2,'judul'=>'Lisa Coachella','grup'=>'BLACKPINK','kategori'=>'Photoshoot','image'=>'https://picsum.photos/seed/gal2/600/700','author'=>'Sari'],
            ['id'=>3,'judul'=>'Hoshi Fanart','grup'=>'SEVENTEEN','kategori'=>'Fanart','image'=>'https://picsum.photos/seed/gal3/600/700','author'=>'Dimas'],
            ['id'=>4,'judul'=>'Karina Cyberpunk','grup'=>'aespa','kategori'=>'Edits','image'=>'https://picsum.photos/seed/gal4/600/700','author'=>'Budi'],
            ['id'=>5,'judul'=>'Wonyoung Photocard','grup'=>'IVE','kategori'=>'Photocard','image'=>'https://picsum.photos/seed/gal5/600/700','author'=>'Nina'],
            ['id'=>6,'judul'=>'Felix Blue Hair','grup'=>'Stray Kids','kategori'=>'Photoshoot','image'=>'https://picsum.photos/seed/gal6/600/700','author'=>'Rina'],
            ['id'=>7,'judul'=>'BTS OT7 Album','grup'=>'BTS','kategori'=>'Album','image'=>'https://picsum.photos/seed/gal7/600/700','author'=>'Sari'],
            ['id'=>8,'judul'=>'aespa Kwangya','grup'=>'aespa','kategori'=>'Fanart','image'=>'https://picsum.photos/seed/gal8/600/700','author'=>'Budi'],
        ];
    }

    public static function comments(): array
    {
        return [
            ['user'=>'Sari','avatar'=>'https://i.pravatar.cc/100?img=45','waktu'=>'1 jam lalu','isi'=>'Setuju banget! Lagu barunya bikin nagih 😍'],
            ['user'=>'Budi','avatar'=>'https://i.pravatar.cc/100?img=33','waktu'=>'45 menit lalu','isi'=>'Aku juga! Sudah repeat 50x kali ini wkwk'],
            ['user'=>'Nina','avatar'=>'https://i.pravatar.cc/100?img=47','waktu'=>'20 menit lalu','isi'=>'Menurutku MV-nya juga bagus sih, aesthetic!'],
        ];
    }

    public static function playlist(): array
    {
        return [
            ['id'=>1,'judul'=>'Butterfly Effect','artist'=>'BTS','durasi'=>'3:24','grup'=>'BTS'],
            ['id'=>2,'judul'=>'Pink Venom','artist'=>'BLACKPINK','durasi'=>'3:06','grup'=>'BLACKPINK'],
            ['id'=>3,'judul'=>'Very Nice','artist'=>'SEVENTEEN','durasi'=>'3:12','grup'=>'SEVENTEEN'],
            ['id'=>4,'judul'=>'Drama','artist'=>'aespa','durasi'=>'3:34','grup'=>'aespa'],
            ['id'=>5,'judul'=>'HEYA','artist'=>'IVE','durasi'=>'3:01','grup'=>'IVE'],
        ];
    }

    public static function notifications(): array
    {
        return [
            ['id'=>1,'tipe'=>'like','user'=>'Sari','avatar'=>'https://i.pravatar.cc/100?img=45','isi'=>'menyukai postinganmu','waktu'=>'5 menit lalu','read'=>false],
            ['id'=>2,'tipe'=>'comment','user'=>'Budi','avatar'=>'https://i.pravatar.cc/100?img=33','isi'=>'mengomentari "Comeback BTS..."','waktu'=>'1 jam lalu','read'=>false],
            ['id'=>3,'tipe'=>'follow','user'=>'Nina','avatar'=>'https://i.pravatar.cc/100?img=47','isi'=>'mulai mengikuti kamu','waktu'=>'3 jam lalu','read'=>true],
            ['id'=>4,'tipe'=>'like','user'=>'Dimas','avatar'=>'https://i.pravatar.cc/100?img=15','isi'=>'menyukai fanart-mu','waktu'=>'1 hari lalu','read'=>true],
        ];
    }

    public static function userProfile(): array
    {
        return [
            'nama'=>'Rina',
            'username'=>'@rina_kpop',
            'avatar'=>'https://i.pravatar.cc/200?img=44',
            'bio'=>'Fanartist | BTS 💜 | Sejak 2018',
            'bias'=>'Jungkook',
            'favorite_groups'=>['BTS','SEVENTEEN','IVE'],
            'posts'=>42,
            'followers'=>1248,
            'following'=>312,
            'joined'=>'Januari 2018',
        ];
    }

    public static function userActivity(): array
    {
        return [
            ['waktu'=>'2 jam lalu','aksi'=>'memposting fanart','detail'=>'Jungkook Purple Era'],
            ['waktu'=>'1 hari lalu','aksi'=>'mengomentari','detail'=>'Postingan comeback BTS'],
            ['waktu'=>'3 hari lalu','aksi'=>'menyukai','detail'=>'Fanart Hoshi oleh Dimas'],
            ['waktu'=>'1 minggu lalu','aksi'=>'memposting','detail'=>'Photocard collection update'],
        ];
    }
}