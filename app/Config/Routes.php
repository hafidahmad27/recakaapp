<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth-Login Backend
$routes->get('/', 'Home::index');
$routes->get('admin', 'Backend\Auth::index');
$routes->post('login_backend', 'Backend\Auth::login', ['as' => 'backend.login']);
$routes->post('logout_backend', 'Backend\Auth::logout', ['as' => 'backend.logout']);

// Routes Backend
$routes->group('backend', static function ($routes) {
    $routes->get('/', 'Backend\Dashboard::index', ['as' => 'backend.dashboard.view']);
    $routes->group('member-levels', static function ($routes) {
        $routes->get('/', 'Backend\MemberLevel::index', ['as' => 'backend.memberLevel.view']);
        $routes->post('insert', 'Backend\MemberLevel::insert', ['as' => 'backend.memberLevel.insert']);
        $routes->post('update', 'Backend\MemberLevel::update', ['as' => 'backend.memberLevel.update']);
        $routes->post('delete', 'Backend\MemberLevel::delete', ['as' => 'backend.memberLevel.delete']);
    });
    $routes->group('members', static function ($routes) {
        $routes->get('/', 'Backend\Member::index', ['as' => 'backend.member.view']);
        $routes->post('insert', 'Backend\Member::insert', ['as' => 'backend.member.insert']);
        $routes->post('update', 'Backend\Member::update', ['as' => 'backend.member.update']);
        $routes->post('delete', 'Backend\Member::delete', ['as' => 'backend.member.delete']);
    });
    $routes->group('produk', static function ($routes) {
        $routes->get('/', 'Backend\Produk::index', ['as' => 'backend.produk.view']);
        $routes->post('insert', 'Backend\Produk::insert', ['as' => 'backend.produk.insert']);
        $routes->post('update', 'Backend\Produk::update', ['as' => 'backend.produk.update']);
        $routes->post('delete', 'Backend\Produk::delete', ['as' => 'backend.produk.delete']);
    });
    $routes->group('harga', static function ($routes) {
        $routes->get('/', 'Backend\Harga::index', ['as' => 'backend.harga.view']);
        $routes->post('insert', 'Backend\Harga::insert', ['as' => 'backend.harga.insert']);
        $routes->post('update', 'Backend\Harga::update', ['as' => 'backend.harga.update']);
        $routes->post('delete', 'Backend\Harga::delete', ['as' => 'backend.harga.delete']);
    });
    $routes->group('vouchers', static function ($routes) {
        $routes->get('/', 'Backend\Voucher::index', ['as' => 'backend.voucher.view']);
        $routes->post('insert', 'Backend\Voucher::insert', ['as' => 'backend.voucher.insert']);
        $routes->post('update', 'Backend\Voucher::update', ['as' => 'backend.voucher.update']);
        $routes->post('delete', 'Backend\Voucher::delete', ['as' => 'backend.voucher.delete']);
    });
    $routes->group('verifikasi-pembayaran', static function ($routes) {
        $routes->get('/', 'Backend\VerifikasiPembayaran::index', ['as' => 'backend.verifikasi_pembayaran.view']);
        $routes->get('daftar-transaksi', 'Backend\VerifikasiPembayaran::daftar_transaksi', ['as' => 'backend.verifikasi_pembayaran.daftar_transaksi.view']);
        $routes->get('daftar-transaksi-detail', 'Backend\VerifikasiPembayaran::daftar_transaksi_detail', ['as' => 'backend.verifikasi_pembayaran.daftar_transaksi_detail.view']);
    });
    $routes->group('reports', static function ($routes) {
        $routes->get('/', 'Backend\Report::index', ['as' => 'backend.report.view']);
        $routes->get('a-reports', 'Backend\Report::a_reports', ['as' => 'backend.report.a_reports.view']);
        $routes->get('b-reports', 'Backend\Report::b_reports', ['as' => 'backend.report.b_reports.view']);
    });
    $routes->group('karyawan', static function ($routes) {
        $routes->get('/', 'Backend\Karyawan::index', ['as' => 'backend.karyawan.view']);
        $routes->post('insert', 'Backend\Karyawan::insert', ['as' => 'backend.karyawan.insert']);
        $routes->post('update', 'Backend\Karyawan::update', ['as' => 'backend.karyawan.update']);
        $routes->post('delete', 'Backend\Karyawan::delete', ['as' => 'backend.karyawan.delete']);
    });
    $routes->group('users', static function ($routes) {
        $routes->get('/', 'Backend\User::index', ['as' => 'backend.user.view']);
        $routes->post('insert', 'Backend\User::insert', ['as' => 'backend.user.insert']);
        $routes->post('update', 'Backend\User::update', ['as' => 'backend.user.update']);
        $routes->post('delete', 'Backend\User::delete', ['as' => 'backend.user.delete']);
    });
    $routes->group('settings', static function ($routes) {
        $routes->get('/', 'Backend\Setting::index', ['as' => 'backend.setting.view']);
    });
});


//Auth-Login Frontend
$routes->get('/', 'Home::index');
$routes->get('login', 'Frontend\Auth::index');
$routes->post('login', 'Frontend\Auth::login', ['as' => 'frontend.login']);
$routes->post('logout', 'Frontend\Auth::logout', ['as' => 'frontend.logout']);

// Routes Frontend
$routes->group('member', static function ($routes) {
    $routes->get('/', 'Frontend\DaftarProduk::index', ['as' => 'frontend.daftar_produk.view']);
    $routes->group('keranjang', static function ($routes) {
        $routes->get('/', 'Frontend\Keranjang::index', ['as' => 'frontend.keranjang.view']);
        $routes->post('addToCart', 'Frontend\Keranjang::addToCart', ['as' => 'frontend.keranjang.addToCart']);
        $routes->post('updateCart', 'Frontend\Keranjang::updateCart', ['as' => 'frontend.keranjang.updateCart']);
        $routes->post('deleteFromCart', 'Frontend\Keranjang::deleteFromCart', ['as' => 'frontend.keranjang.deleteFromCart']);

        $routes->get('transaksi', 'Frontend\Transaksi::index', ['as' => 'frontend.transaksi.view']);
        $routes->post('insert', 'Frontend\Transaksi::insert', ['as' => 'frontend.transaksi.insert']);
    });
    $routes->get('riwayat-transaksi', 'Frontend\Transaksi::riwayat_transaksi', ['as' => 'frontend.report.view']);
    $routes->get('cek-voucher', 'Frontend\CekVoucher::index', ['as' => 'frontend.cek_voucher.view']);
    $routes->get('settings', 'Frontend\Setting::index', ['as' => 'frontend.setting.view']);
});
