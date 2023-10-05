<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AriController;
use App\Http\Controllers\KudController;
use App\Http\Controllers\DirtController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\KspotController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\TspotController;
use App\Http\Controllers\FactorController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\MethodController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\BalanceController;
use App\Http\Controllers\InputHKController;
use App\Http\Controllers\KawalanController;
use App\Http\Controllers\MollaseController;
use App\Http\Controllers\PosbrixController;
use App\Http\Controllers\RestockController;
use App\Http\Controllers\ScoringController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\VarietyController;
use App\Http\Controllers\WilayahController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\ChemicalController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndicatorController;
use App\Http\Controllers\KactivityController;
use App\Http\Controllers\PospantauController;
use App\Http\Controllers\TactivityController;
use App\Http\Controllers\ChangeDateController;
use App\Http\Controllers\ConsumableController;
use App\Http\Controllers\CoreSampleController;
use App\Http\Controllers\ImbibitionController;
use App\Http\Controllers\AriSamplingController;
use App\Http\Controllers\CetakRonselController;
use App\Http\Controllers\TestApiPde2Controller;
use App\Http\Controllers\MasakanTurunController;
use App\Http\Controllers\SampleResultController;
use App\Http\Controllers\InputPolAmpasController;
use App\Http\Controllers\InputRendemenController;
use App\Http\Controllers\PenggunaanBppController;
use App\Http\Controllers\RawsugarinputController;
use App\Http\Controllers\StationResultController;
use App\Http\Controllers\KelilingResultController;
use App\Http\Controllers\RawsugaroutputController;
use App\Http\Controllers\ConsumableUsageController;
use App\Http\Controllers\InputPolBlotongController;
use App\Http\Controllers\MaterialBalanceController;
use App\Http\Controllers\ChemicalcheckingController;
use App\Http\Controllers\InputAnalisaUmumController;
use App\Http\Controllers\InputAnalisaKetelController;
use App\Http\Controllers\TimbanganInProsesController;
use App\Http\Controllers\AnalisaPendahuluanController;
use App\Http\Controllers\AnalysisUnverifiedController;
use App\Http\Controllers\CetakLaporanMandorController;
use App\Http\Controllers\CoreSampleSamplingController;
use App\Http\Controllers\PosbrixPerCategoryController;
use App\Http\Controllers\CetakBarcodeByCategoryController;
// use App\Http\Controllers\AriController;
// use App\Http\Controllers\CoaController;
// use App\Http\Controllers\KudController;
// use App\Http\Controllers\RitController;
// use App\Http\Controllers\DirtController;
// use App\Http\Controllers\HomeController;
// use App\Http\Controllers\SkmtController;
// use App\Http\Controllers\TestController;
// use App\Http\Controllers\ScoreController;
// use App\Http\Controllers\FixAriController;
// use App\Http\Controllers\KvalueController;
// use App\Http\Controllers\ReportController;
// use App\Http\Controllers\SampleController;
// use App\Http\Controllers\TvalueController;
// use App\Http\Controllers\BalanceController;
// use App\Http\Controllers\KawalanController;
// use App\Http\Controllers\MollaseController;
// use App\Http\Controllers\PosbrixController;
// use App\Http\Controllers\VarietyController;
// use App\Http\Controllers\ViewAriController;
// use App\Http\Controllers\WilayahController;
// use App\Http\Controllers\ActivityController;
// use App\Http\Controllers\ChemicalController;
// use App\Http\Controllers\DataJagaController;
// use App\Http\Controllers\GoalSeekController;
// use App\Http\Controllers\AnalisaPenilaianMbs;
// use App\Http\Controllers\IndicatorController;
// use App\Http\Controllers\KactivityController;
// use App\Http\Controllers\PospantauController;
// use App\Http\Controllers\Product50Controller;
// use App\Http\Controllers\TactivityController;
// use App\Http\Controllers\UpdateRitController;
// use App\Http\Controllers\CoreSampleController;
// use App\Http\Controllers\ImbibitionController;
// use App\Http\Controllers\MonitoringController;
// use App\Http\Controllers\TestApiPdeController;
// use App\Http\Controllers\AnalisaHplcController;
// use App\Http\Controllers\AnalisaUmumController;
// use App\Http\Controllers\AriSamplingController;
// use App\Http\Controllers\CertificateController;
// use App\Http\Controllers\CetakRonselController;
// use App\Http\Controllers\PosbrixRfidController;
// use App\Http\Controllers\SaccharomatController;
// use App\Http\Controllers\TestApiPde2Controller;
// use App\Http\Controllers\AnalisaAmpasController;
// use App\Http\Controllers\AnalisaKetelController;
// use App\Http\Controllers\CetakBarcodeController;
// use App\Http\Controllers\SampleResultController;
// use App\Http\Controllers\ScoringValueController;
// use App\Http\Controllers\RawsugarinputController;
// use App\Http\Controllers\StationResultController;
// use App\Http\Controllers\ViewTimbanganController;
// use App\Http\Controllers\AnalisaPosBrixController;
// use App\Http\Controllers\FlowNiraMentahController;
// use App\Http\Controllers\GenerateNewAriController;
// use App\Http\Controllers\RawsugaroutputController;
// use App\Http\Controllers\ApiAriTimbanganController;
// use App\Http\Controllers\GenerateNewSptaController;
// use App\Http\Controllers\ScanRfidPosbrixController;
// use App\Http\Controllers\ViewAriSamplingController;
// use App\Http\Controllers\AdjustAriPerDateController;
// use App\Http\Controllers\ChemicalcheckingController;
// use App\Http\Controllers\KoreksiTimbanganController;
// use App\Http\Controllers\ScanRfidPosbrixEbControlle;
// use App\Http\Controllers\TurbidityAverageController;
// use App\Http\Controllers\AplikasiPosBrixEbController;
// use App\Http\Controllers\AplikasiPosBrixEkController;
// use App\Http\Controllers\GenerateRitBySptaController;
// use App\Http\Controllers\MonitoringMasakanController;
// use App\Http\Controllers\AplikasiPenerimaanController;
// use App\Http\Controllers\CertificateContentController;
// use App\Http\Controllers\CetakLaporanMandorController;
// use App\Http\Controllers\MonitoringSaveDateController;
// use App\Http\Controllers\ViewOnFarmDatabaseController;
// use App\Http\Controllers\DisplayAriSampling2Controller;
// use App\Http\Controllers\DisplayCoreSamplingController;
// use App\Http\Controllers\AplikasiTapSampleAriController;
// use App\Http\Controllers\AplikasiTapTimbanganController;
// use App\Http\Controllers\FindResultByIdentityController;
// use App\Http\Controllers\MonitoringSelectDateController;
// use App\Http\Controllers\AplikasiPenilaianTebuController;
// use App\Http\Controllers\PosbrixRfidCoreSampleController;
// use App\Http\Controllers\AplikasiTapSampleAriEbController;
// use App\Http\Controllers\AplikasiTapTimbanganEbController;
// use App\Http\Controllers\CetakBarcodeByCategoryController;
// use App\Http\Controllers\AplikasiTapCoreSamplingController;
// use App\Http\Controllers\GenerateAriBySamplingIdController;
// use App\Http\Controllers\AnalisaPosBrixCoreSampleController;
// use App\Http\Controllers\AutomateUpdateRitIdentityController;
// use App\Http\Controllers\ScanRfidPosbrixCoreSampleController;

// Auth
Route::get("login", [ LoginController::class, "index" ])->name("login");
Route::post("login_process", [ LoginController::class, "process" ])->name("login_process");
Route::get("logout", LogoutController::class)->name("logout");
Route::post("changeDate", ChangeDateController::class)->name("changeDate");

// Resource Off Farm
Route::resource("users", UserController::class)->middleware(["auth", "it"]);
Route::resource("stations", StationController::class)->middleware(["auth", "kasie"]);
Route::resource("indicators", IndicatorController::class)->middleware(["auth", "kasie"]);
Route::resource("factors", FactorController::class)->middleware(["auth", "kasie"]);
Route::resource("materials", MaterialController::class)->middleware(["auth", "mandor"]);
Route::resource("methods", MethodController::class)->middleware(["auth", "mandor"]);
Route::resource("kspots", KspotController::class)->middleware(["auth", "kasie"]);
Route::resource("tspots", TspotController::class)->middleware(["auth", "kasie"]);
Route::resource("chemicals", ChemicalController::class)->middleware(["auth", "kasie"]);
Route::resource("consumables", ConsumableController::class)->middleware(["auth", "kasie"]);
Route::resource("analyses", AnalysisController::class)->middleware(["auth", "operator_qc"]);
Route::resource("kactivities", KactivityController::class)->middleware(["auth", "operator_qc"]);
Route::resource("tactivities", TactivityController::class)->middleware(["auth", "operator_non_qc"]);
Route::resource("chemicalcheckings", ChemicalcheckingController::class)->middleware(["auth", "mandor"]);
Route::resource("consumableusages", ConsumableUsageController::class)->middleware(["auth", "mandor"]);
Route::resource("balances", BalanceController::class)->middleware(["auth", "operator_qc"]);
Route::resource("imbibitions", ImbibitionController::class)->middleware(["auth", "operator_non_qc"]);
Route::resource("mollases", MollaseController::class)->middleware(["auth", "koordinator"]);
Route::resource("rawsugarinputs", RawsugarinputController::class)->middleware(["auth", "koordinator"]);
Route::resource("rawsugaroutputs", RawsugaroutputController::class)->middleware(["auth", "koordinator"]);

// Resource On Farm
Route::resource("kuds", KudController::class)->middleware(["auth", "kasubsie"]);
Route::resource("pospantaus", PospantauController::class)->middleware(["auth", "kasubsie"]);
Route::resource("wilayahs", WilayahController::class)->middleware(["auth", "kasubsie"]);
Route::resource("varieties", VarietyController::class)->middleware(["auth", "kasubsie"]);
Route::resource("kawalans", KawalanController::class)->middleware(["auth", "kasubsie"]);
Route::resource("dirts", DirtController::class)->middleware(["auth", "kasubsie"]);
Route::resource("analisa_pendahuluans", AnalisaPendahuluanController::class)->middleware(["auth", "operator_qc"]);
Route::resource("posbrixes", PosbrixController::class)->middleware(["auth", "operator_qc"]);
Route::resource("core_samples", CoreSampleController::class)->middleware(["auth", "operator_qc"]);
Route::resource("aris", AriController::class)->middleware(["auth", "operator_qc"]);
Route::resource("scores", ScoreController::class)->middleware(["auth", "operator_qc"]);

// Other
Route::get("/", HomeController::class)->name("home")->middleware(["auth"]);
Route::get("dashboard", [DashboardController::class, "index"])->name("dashboard")->middleware(["auth"]);
Route::post("input_hk", InputHKController::class)->name("input_hk")->middleware(["auth", "operator_qc"]);
Route::post("input_rendemen", InputRendemenController::class)->name("input_rendemen")->middleware(["auth", "operator_qc"]);
Route::post("input_pol_ampas", InputPolAmpasController::class)->name("input_pol_ampas")->middleware(["auth", "operator_qc"]);
Route::post("input_pol_blotong", InputPolBlotongController::class)->name("input_pol_blotong")->middleware(["auth", "operator_qc"]);
Route::post("input_analisa_umum", InputAnalisaUmumController::class)->name("input_analisa_umum")->middleware(["auth", "operator_qc"]);
Route::post("input_analisa_ketel", InputAnalisaKetelController::class)->name("input_analisa_ketel")->middleware(["auth", "operator_qc"]);
Route::get("verifikasi_mandor", [AnalysisUnverifiedController::class, "index"])->name("verifikasi_mandor.index")->middleware(["auth", "mandor"]);
Route::post("verifikasi_mandor", [AnalysisUnverifiedController::class, "process"])->name("verifikasi_mandor.process")->middleware(["auth", "mandor"]);
Route::post("restock", RestockController::class)->name("restock")->middleware(["auth", "pic"]);
Route::get("cetak_ronsel", [CetakRonselController::class, "index"])->name("cetak_ronsel")->middleware(["auth", "operator_non_qc"]);
Route::post("cetak_ronsel_store", [CetakRonselController::class, "store"])->name("cetak_ronsel_store")->middleware(["auth", "operator_non_qc"]);
Route::get("cetak_barcode_by_category/{station_id}", [CetakBarcodeByCategoryController::class, "index"])->name("cetak_barcode_by_category")->middleware(["auth", "operator_qc"]);
Route::post("cetak_barcode_by_category_store", [CetakBarcodeByCategoryController::class, "store"])->name("cetak_barcode_by_category_store")->middleware(["auth", "operator_qc"]);
Route::get("station_result/{station_id}", StationResultController::class)->name("station_result")->middleware(["auth"]);
Route::get("sample_result/{material_id}", SampleResultController::class)->name("sample_result")->middleware(["auth", "operator_non_qc"]);
Route::get("posbrix/create2/{category}", PosbrixPerCategoryController::class)->name("posbrixes.create2")->middleware(["auth", "operator_qc"]);
Route::get("core_sample/create2", [CoreSampleSamplingController::class, "index"])->name("core_samples.create2")->middleware(["auth", "operator_qc"]);
Route::get("ari/create2", [AriSamplingController::class, "index"])->name("aris.create2")->middleware(["auth", "operator_qc"]);
Route::post("core_sample/create2", [CoreSampleSamplingController::class, "process"])->name("core_samples.process")->middleware(["auth", "operator_qc"]);
Route::post("ari/create2", [AriSamplingController::class, "process"])->name("aris.process")->middleware(["auth", "operator_qc"]);
Route::get("material_balance", MaterialBalanceController::class)->name("material_balance")->middleware(["auth"]);
Route::get("keliling_result", KelilingResultController::class)->name("keliling_result")->middleware(["auth"]);
Route::get("timbangan_in_proses", TimbanganInProsesController::class)->name("timbangan_in_proses")->middleware(["auth"]);
Route::get("masakan_turun", MasakanTurunController::class)->name("masakan_turun")->middleware(["auth"]);
Route::get("penggunaan_bpp", PenggunaanBppController::class)->name("penggunaan_bpp")->middleware(["auth"]);
Route::get("reward_punishment", ScoringController::class)->name("reward_punishment")->middleware(["auth"]);

// Route::resource("scoring_values", ScoringValueController::class)->middleware(["auth", "operator_qc"]);
// Route::resource("product50s", Product50Controller::class)->middleware(["auth", "operator_qc"]);

Route::get("report", [ ReportController::class, "index" ])->name("report")->middleware(["auth", "mandor"]);
Route::get("cetak_laporan_mandor", [ CetakLaporanMandorController::class, "index" ])->name("cetak_laporan_mandor")->middleware(["auth", "mandor"]);
Route::post("cetak_laporan_mandor_process", [ CetakLaporanMandorController::class, "process" ])->name("cetak_laporan_mandor_process")->middleware(["auth", "mandor"]);

// Route::get("activities", ActivityController::class)->name("activities")->middleware(["auth", "kabag"]);
// Route::get("saccharomat", [SaccharomatController::class, "index"])->name("saccharomat")->middleware(["auth", "operator_qc"]);
// Route::get("analisa_ampas", [AnalisaAmpasController::class, "index"])->name("analisa_ampas")->middleware(["auth", "operator_qc"]);
// Route::get("analisa_umum", [AnalisaUmumController::class, "index"])->name("analisa_umum")->middleware(["auth", "operator_qc"]);
// Route::get("analisa_ketel", [AnalisaKetelController::class, "index"])->name("analisa_ketel")->middleware(["auth", "operator_qc"]);
// Route::get("analisa_hplc", [AnalisaHplcController::class, "index"])->name("analisa_hplc")->middleware(["auth", "operator_qc"]);
// Route::get("cetak_barcode", [CetakBarcodeController::class, "index"])->name("cetak_barcode")->middleware(["auth", "operator_qc"]);
// Route::post("saccharomat_store", [SaccharomatController::class, "store"])->name("saccharomat_store")->middleware(["auth", "operator_qc"]);
// Route::post("saccharomat_delete", [SaccharomatController::class, "delete"])->name("saccharomat_delete")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_ampas_store", [AnalisaAmpasController::class, "store"])->name("analisa_ampas_store")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_ampas_delete", [AnalisaAmpasController::class, "delete"])->name("analisa_ampas_delete")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_umum_delete", [AnalisaUmumController::class, "delete"])->name("analisa_umum_delete")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_umum_store", [AnalisaUmumController::class, "store"])->name("analisa_umum_store")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_ketel_store", [AnalisaKetelController::class, "store"])->name("analisa_ketel_store")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_ketel_delete", [AnalisaKetelController::class, "delete"])->name("analisa_ketel_delete")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_hplc_store", [AnalisaHplcController::class, "store"])->name("analisa_hplc_store")->middleware(["auth", "operator_qc"]);
// Route::post("analisa_hplc_delete", [AnalisaHplcController::class, "delete"])->name("analisa_hplc_delete")->middleware(["auth", "operator_qc"]);
// Route::post("cetak_barcode_store", [CetakBarcodeController::class, "store"])->name("cetak_barcode_store")->middleware(["auth", "operator_qc"]);
// Route::get("monitoring", MonitoringController::class)->name("monitoring")->middleware(["auth", "operator_non_qc"]);
// Route::get("monitoring_select_date", MonitoringSelectDateController::class)->name("monitoring_select_date")->middleware(["auth", "operator_non_qc"]);
// Route::post("monitoring_save_date", MonitoringSaveDateController::class)->name("monitoring_save_date")->middleware(["auth", "operator_non_qc"]);
// Route::get("rit", AplikasiPenerimaanController::class)->name("rit")->middleware(["auth", "koordinator"]);
// Route::get("score", AnalisaPenilaianMbs::class)->name("score")->middleware(["auth", "koordinator"]);

// Aplikasi Posbrix
// Route::get("posbrix/{spta}/{category}", AnalisaPosBrixController::class)->name("posbrix")->middleware(["auth", "operator_qc"]);
// Route::get("scan_rfid", ScanRfidPosbrixController::class)->name("scan_rfid")->middleware(["auth", "operator_qc"]);
// Route::get("scan_rfid_eb", ScanRfidPosbrixEbControlle::class)->name("scan_rfid_eb")->middleware(["auth", "operator_qc"]);
// Route::post("process_rfid", PosbrixRfidController::class)->name("process_rfid")->middleware(["auth", "operator_qc"]);
// Route::post("process_rfid_eb", PosbrixRfidController::class)->name("process_rfid_eb")->middleware(["auth", "operator_qc"]);
// Route::post("process_posbrix_ek", AplikasiPosBrixEkController::class)->name("process_posbrix_ek")->middleware(["auth", "operator_qc"]);
// Route::post("process_posbrix_eb", AplikasiPosBrixEbController::class)->name("process_posbrix_eb")->middleware(["auth", "operator_qc"]);

// Aplikasi Tap Timbangan
// Route::get("tap_timbangan", [AplikasiTapTimbanganController::class, "index"])->name("tap_timbangan")->middleware(["auth", "operator_qc"]);
// Route::get("tap_timbangan_eb", [AplikasiTapTimbanganEbController::class, "index"])->name("tap_timbangan_eb")->middleware(["auth", "operator_qc"]);
// Route::get("tap_core_sampling", [AplikasiTapCoreSamplingController::class, "index"])->name("tap_core_sampling")->middleware(["auth", "operator_qc"]);
// Route::post("tap_timbangan_process", [AplikasiTapTimbanganController::class, "process"])->name("tap_timbangan_process")->middleware(["auth", "operator_qc"]);
// Route::post("tap_timbangan_process", [AplikasiTapTimbanganController::class, "process_alt"])->name("tap_timbangan_process")->middleware(["auth", "operator_qc"]);
// Route::post("tap_timbangan_process", [AplikasiTapTimbanganController::class, "process"])->name("tap_timbangan_process")->middleware(["auth", "operator_qc"]);
// Route::post("tap_timbangan_eb_process", [AplikasiTapTimbanganEbController::class, "process"])->name("tap_timbangan_eb_process")->middleware(["auth", "operator_qc"]);
// Route::post("tap_core_sampling_process", [AplikasiTapCoreSamplingController::class, "process"])->name("tap_core_sampling_process")->middleware(["auth", "operator_qc"]);
// Route::get("tap_sukses", [AplikasiTapTimbanganController::class, "tap_sukses"])->name("tap_sukses")->middleware(["auth", "operator_qc"]);

// Aplikasi Tap Sample Ari
// Route::get("tap_sample_ari", [AplikasiTapSampleAriController::class, "index"])->name("tap_sample_ari")->middleware(["auth", "operator_qc"]);
// Route::get("tap_sample_ari_eb", [AplikasiTapSampleAriEbController::class, "index"])->name("tap_sample_ari_eb")->middleware(["auth", "operator_qc"]);
// Route::post("tap_sample_ari_process", [AplikasiTapSampleAriController::class, "process"])->name("tap_sample_ari_process")->middleware(["auth", "operator_qc"]);
// Route::post("tap_sample_ari_eb_process", [AplikasiTapSampleAriEbController::class, "process"])->name("tap_sample_ari_eb_process")->middleware(["auth", "operator_qc"]);

// Dummy Data
// Route::get("generate_new_spta/{spta}", GenerateNewSptaController::class)->name("generate_new_spta")->middleware(["auth", "it"]);
// Route::get("generate_new_ari/{rit_id}", GenerateNewAriController::class)->name("generate_new_ari")->middleware(["auth", "it"]);
// Route::get("update_rit/{antrian}", UpdateRitController::class)->name("update_rit")->middleware(["auth", "it"]);
// Route::get("generate_ari_by_sampling/{ari_sampling_id}", GenerateAriBySamplingIdController::class)->name("generate_ari_by_sampling")->middleware(["auth", "it"]);
// Route::get("generate_rit_by_spta/{spta}/{barcode_antrian}", GenerateRitBySptaController::class)->name("generate_rit_by_spta")->middleware(["auth", "it"]);

// Aplikasi SKMT
// Route::get("skmt/{id}", SkmtController::class)->name("skmt")->middleware(["auth", "operator_qc"]);

// Timbangan

// Wilayah

// TestApiPde
// Route::get("test_api_pde/{rfid}", TestApiPdeController::class)->name("test_api_pde");
Route::get("test_api_pde2", TestApiPde2Controller::class)->name("test_api_pde2");

// Aplikasi Penilaian
// Route::get("meja_selatan", [AplikasiPenilaianTebuController::class, "meja_selatan"])->name("meja_selatan")->middleware(["auth", "operator_qc"]);
// Route::get("meja_utara", [AplikasiPenilaianTebuController::class, "meja_utara"])->name("meja_utara")->middleware(["auth", "operator_qc"]);
// Route::post("proses_meja_utara", [AplikasiPenilaianTebuController::class, "proses_meja_utara"])->name("proses_meja_utara")->middleware(["auth", "operator_qc"]);
// Route::post("proses_meja_selatan", [AplikasiPenilaianTebuController::class, "proses_meja_selatan"])->name("proses_meja_selatan")->middleware(["auth", "operator_qc"]);
// Route::get("penilaian_meja_utara_sukses/{score}", [AplikasiPenilaianTebuController::class, "penilaian_meja_utara_sukses"])->name("penilaian_meja_utara_sukses")->middleware(["auth", "operator_qc"]);
// Route::get("penilaian_meja_selatan_sukses/{score}", [AplikasiPenilaianTebuController::class, "penilaian_meja_selatan_sukses"])->name("penilaian_meja_selatan_sukses")->middleware(["auth", "operator_qc"]);

// Core Sample Scenario
// Route::get("scan_rfid_core_sample_ek", [ScanRfidPosbrixCoreSampleController::class, "scan_rfid_core_sample_ek"])->middleware(["auth", "operator_qc"])->name("scan_rfid_core_sample_ek");
// Route::get("scan_rfid_core_sample_eb", [ScanRfidPosbrixCoreSampleController::class, "scan_rfid_core_sample_eb"])->middleware(["auth", "operator_qc"])->name("scan_rfid_core_sample_eb");
// Route::post("scan_rfid_core_sample_ek_process", [ScanRfidPosbrixCoreSampleController::class, "scan_rfid_core_sample_ek_process"])->middleware(["auth", "operator_qc"])->name("scan_rfid_core_sample_ek_process");
// Route::post("scan_rfid_core_sample_eb_process", [ScanRfidPosbrixCoreSampleController::class, "scan_rfid_core_sample_eb_process"])->middleware(["auth", "operator_qc"])->name("scan_rfid_core_sample_eb_process");
// Route::get("posbrix_core_sample/{spta}/{category}", AnalisaPosBrixCoreSampleController::class)->name("posbrix_core_sample")->middleware(["auth", "operator_qc"]);
// Route::post("process_rfid_core_sample", PosbrixRfidCoreSampleController::class)->name("process_rfid_core_sample")->middleware(["auth", "operator_qc"]);

// Route::get("view_arisampling", ViewAriSamplingController::class)->name("view_arisampling");
// Route::get("view_ari", ViewAriController::class)->name("view_ari");
// Route::get("view_timbangan", ViewTimbanganController::class)->name("view_timbangan");
// Route::get("view_onfarm/{date}", ViewOnFarmDatabaseController::class)->name("view_onfarm")->middleware(["auth", "operator_qc"]);
// Route::get("tes", [TestController::class, "index"])->middleware(["auth", "it"]);

// Route::get("find_result_by_identity", [FindResultByIdentityController::class, "index"])->name("find_result_by_identity")->middleware(["auth", "operator_qc"]);
// Route::post("find_result_by_identity_process", [FindResultByIdentityController::class, "process"])->name("find_result_by_identity_process")->middleware(["auth", "operator_qc"]);

// Automate Update Rit
// Route::get("automate_update_rit_identity", AutomateUpdateRitIdentityController::class)->name("automate_update_rit_identity");

// Hl Masakan
// Route::get("monitoring_masakan", MonitoringMasakanController::class)->name("monitoring_masakan")->middleware(["auth"]);

// Display Core Sample
// Route::get("display_core_sample", DisplayCoreSamplingController::class)->name("display_core_sample")->middleware(["auth"]);
// Route::get("display_ari_sampling2", DisplayAriSampling2Controller::class)->name("display_ari_sampling2")->middleware(["auth"]);
// Route::get("koreksi_timbangan/{type}/{date}/{requested_value}", KoreksiTimbanganController::class)->name("koreksi_timbangan");

// Fix Ari
// Route::get("fix_ari", [FixAriController::class, "index"])->name("fix_ari")->middleware(["auth"]);

// Goal Seek
// Route::get("goal_seek", [GoalSeekController::class, "index"])->name("goal_seek")->middleware(["auth", "it"]);
// Route::post("goal_seek", [GoalSeekController::class, "process"])->name("goal_seek_process")->middleware(["auth", "it"]);

// Data Jaga
// Route::get("data_jaga", [DataJagaController::class, "lembar1"])->name("data_jaga_lembar1")->middleware(["auth", "it"]);
// Route::get("data_jaga_lembar2", [DataJagaController::class, "lembar2"])->name("data_jaga_lembar2")->middleware(["auth", "it"]);
// Route::get("flow_nm", [FlowNiraMentahController::class, "index"])->name("flow_nm")->middleware(["auth", "operator_non_qc"]);

// Api Timbangan
// Route::get("api_ari_timbangan/{rfid}", [ApiAriTimbanganController::class, "index"])->name("api_ari_timbangan");

// Testing
// Route::get("test", [TestController::class, "index"])->name("test")->middleware(["auth", "it"]);
// Route::post("test", [TestController::class, "process"])->name("test.process")->middleware(["auth", "it"]);

// Adjust Ari
// Route::get("adjust_ari", [AdjustAriPerDateController::class, "index"])->name("adjust_ari")->middleware(["auth", "pic"]);
// Route::post("adjust_ari", [AdjustAriPerDateController::class, "process"])->name("adjust_ari.process")->middleware(["auth", "pic"]);

// Turbidity Avg
// Route::get("turbidity_average", [TurbidityAverageController::class, "index"])->name("turbidity_average");

// Vary Ari
// Route::get("vary_ari/{date}", [FixAriController::class, "varyAry"])->name("varyAry")->middleware(["auth", "it"]);
// Route::get("add_one_point_ari/{ari_id}", [FixAriController::class, "addOnePointAri"])->name("addOnePointAri")->middleware(["auth", "it"]);
