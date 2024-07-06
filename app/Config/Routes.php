<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//Auth-Login Backend
$routes->get('/', 'Home::index');
$routes->get('admin', 'Backend\Auth::index', ['filter' => 'userLoggedIn']);
$routes->post('login_backend', 'Backend\Auth::login_backend', ['as' => 'backend.login']);
$routes->get('logout_backend', 'Backend\Auth::logout_backend', ['as' => 'backend.logout']);

// Routes Backend
$routes->group('backend', ['filter' => 'userNotLoggedIn'], static function ($routes) {
    $routes->get('/', 'Backend\Dashboard::index', ['as' => 'backend.dashboard.view']);
    $routes->group('member-levels', static function ($routes) {
        $routes->get('/', 'Backend\MemberLevel::index', ['as' => 'backend.member_level.view']);
        $routes->post('insert', 'Backend\MemberLevel::insert', ['as' => 'backend.member_level.insert']);
        $routes->post('update', 'Backend\MemberLevel::update', ['as' => 'backend.member_level.update']);
        $routes->post('delete', 'Backend\MemberLevel::delete', ['as' => 'backend.member_level.delete']);
    });
    $routes->group('members', static function ($routes) {
        $routes->get('/', 'Backend\Member::index', ['as' => 'backend.member.view']);
        $routes->post('insert', 'Backend\Member::insert', ['as' => 'backend.member.insert']);
        $routes->post('update', 'Backend\Member::update', ['as' => 'backend.member.update']);
        $routes->post('delete', 'Backend\Member::delete', ['as' => 'backend.member.delete']);
        $routes->post('resetPassword', 'Backend\Member::resetPassword', ['as' => 'backend.member.resetPassword']);
        $routes->post('userStatus', 'Backend\Member::userStatus', ['as' => 'backend.member.userStatus']);
    });
    $routes->group('produk', static function ($routes) {
        $routes->get('/', 'Backend\Produk::index', ['as' => 'backend.produk.view']);
        $routes->get('form_add', 'Backend\Produk::form_add', ['as' => 'backend.produk.form_add.view']);
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
        $routes->get('form_add', 'Backend\Voucher::form_add', ['as' => 'backend.voucher.form_add.view']);
        $routes->post('insert', 'Backend\Voucher::insert', ['as' => 'backend.voucher.insert']);
        $routes->post('update', 'Backend\Voucher::update', ['as' => 'backend.voucher.update']);
        $routes->post('delete', 'Backend\Voucher::delete', ['as' => 'backend.voucher.delete']);
    });
    $routes->group('verifikasi-pembayaran', static function ($routes) {
        $routes->get('/', 'Backend\VerifikasiPembayaran::index', ['as' => 'backend.verifikasi_pembayaran.view']);
    });
    $routes->group('daftar-transaksi', static function ($routes) {
        $routes->get('/', 'Backend\VerifikasiPembayaran::daftar_transaksi', ['as' => 'backend.verifikasi_pembayaran.daftar_transaksi.view']);
        $routes->get('detail-transaksi/(:any)', 'Backend\VerifikasiPembayaran::detail_transaksi/$1', ['as' => 'backend.verifikasi_pembayaran.detail_transaksi.view']);
    });
    $routes->group('reports', static function ($routes) {
        $routes->get('/', 'Backend\Report::index', ['as' => 'backend.report.view']);
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
        $routes->post('resetPassword', 'Backend\User::resetPassword', ['as' => 'backend.user.resetPassword']);
        $routes->post('userStatus', 'Backend\User::userStatus', ['as' => 'backend.user.userStatus']);
    });
    $routes->group('settings', static function ($routes) {
        $routes->get('/', 'Backend\Setting::index', ['as' => 'backend.setting.view']);
        $routes->post('changeProfil', 'Backend\Setting::changeProfil', ['as' => 'backend.setting.changeProfil']);
        $routes->post('changePassword', 'Backend\Setting::changePassword', ['as' => 'backend.setting.changePassword']);
    });
});

// get value by ID with AJAX for modal edit form
$routes->post('editMemberById', 'Backend\Member::getEditById');
$routes->post('editProdukById', 'Backend\Produk::getEditById');
$routes->post('editHargaById', 'Backend\Harga::getEditById');
$routes->post('editVoucherById', 'Backend\Voucher::getEditById');
$routes->post('editKaryawanById', 'Backend\Karyawan::getEditById');
$routes->post('editCartItemById', 'Backend\Transaction::getEditCartItemById');


//Auth-Login Frontend
$routes->get('/', 'Home::index');
$routes->get('login', 'Frontend\Auth::index', ['as' => 'frontend.login.view']);
$routes->post('login', 'Frontend\Auth::login', ['as' => 'frontend.login']);
$routes->post('logout', 'Frontend\Auth::logout', ['as' => 'frontend.logout']);
$routes->get('lupa-password', 'Frontend\Auth::lupa_password', ['as' => 'frontend.lupa_password.view']);

// Routes Frontend
$routes->group('member', static function ($routes) {
    $routes->get('/', 'Frontend\Pages::index', ['as' => 'frontend.page.home.view']);
    $routes->get('shop', 'Frontend\Pages::shop', ['as' => 'frontend.page.shop.view']);
    $routes->get('about', 'Frontend\Pages::about', ['as' => 'frontend.page.about.view']);
    $routes->get('services', 'Frontend\Pages::services', ['as' => 'frontend.page.services.view']);
    $routes->get('blog', 'Frontend\Pages::blog', ['as' => 'frontend.page.blog.view']);
    $routes->get('contact', 'Frontend\Pages::contact', ['as' => 'frontend.page.contact.view']);
    $routes->get('cart', 'Frontend\Pages::cart', ['as' => 'frontend.page.cart.view']);
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
