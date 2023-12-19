<?php

namespace Database\Seeders;

use App\Models\BankModel;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'BANK BRI','kode' => '002'],
            ['nama' => 'BANK EKSPOR INDONESIA','kode' => '003'],
            ['nama' => 'BANK MANDIRI','kode' => '008'],
            ['nama' => 'BANK BNI','kode' => '009'],
            ['nama' => 'BANK BNI SYARIAH','kode' => '427'],
            ['nama' => 'BANK DANAMON','kode' => '011'],
            ['nama' => 'PERMATA BANK','kode' => '013'],
            ['nama' => 'BANK BCA','kode' => '014'],
            ['nama' => 'BANK BII','kode' => '016'],
            ['nama' => 'BANK PANIN','kode' => '019'],
            ['nama' => 'BANK ARTA NIAGA KENCANA','kode' => '020'],
            ['nama' => 'BANK NIAGA','kode' => '022'],
            ['nama' => 'BANK BUANA IND','kode' => '023'],
            ['nama' => 'BANK LIPPO','kode' => '026'],
            ['nama' => 'BANK NISP','kode' => '028'],
            ['nama' => 'AMERICAN EXPRESS BANK LTD','kode' => '030'],
            ['nama' => 'CITIBANK N.A.','kode' => '031'],
            ['nama' => 'JP. MORGAN CHASE BANK, N.A.','kode' => '032'],
            ['nama' => 'BANK OF AMERICA, N.A','kode' => '033'],
            ['nama' => 'ING INDONESIA BANK','kode' => '034'],
            ['nama' => 'BANK MULTICOR TBK.','kode' => '036'],
            ['nama' => 'BANK ARTHA GRAHA','kode' => '037'],
            ['nama' => 'BANK CREDIT AGRICOLE INDOSUEZ','kode' => '039'],
            ['nama' => 'THE BANGKOK BANK COMP. LTD','kode' => '040'],
            ['nama' => 'THE HONGKONG & SHANGHAI B.C.','kode' => '041'],
            ['nama' => 'THE BANK OF TOKYO MITSUBISHI UFJ LTD','kode' => '042'],
            ['nama' => 'BANK SUMITOMO MITSUI INDONESIA','kode' => '045'],
            ['nama' => 'BANK DBS INDONESIA','kode' => '046'],
            ['nama' => 'BANK RESONA PERDANIA','kode' => '047'],
            ['nama' => 'BANK MIZUHO INDONESIA','kode' => '048'],
            ['nama' => 'STANDARD CHARTERED BANK','kode' => '050'],
            ['nama' => 'BANK ABN AMRO','kode' => '052'],
            ['nama' => 'BANK KEPPEL TATLEE BUANA','kode' => '053'],
            ['nama' => 'BANK CAPITAL INDONESIA, TBK.','kode' => '054'],
            ['nama' => 'BANK BNP PARIBAS INDONESIA','kode' => '057'],
            ['nama' => 'BANK UOB INDONESIA','kode' => '058'],
            ['nama' => 'KOREA EXCHANGE BANK DANAMON','kode' => '059'],
            ['nama' => 'RABOBANK INTERNASIONAL INDONESIA','kode' => '060'],
            ['nama' => 'ANZ PANIN BANK','kode' => '061'],
            ['nama' => 'DEUTSCHE BANK AG.','kode' => '067'],
            ['nama' => 'BANK WOORI INDONESIA','kode' => '068'],
            ['nama' => 'BANK OF CHINA LIMITED','kode' => '069'],
            ['nama' => 'BANK BUMI ARTA','kode' => '076'],
            ['nama' => 'BANK EKONOMI','kode' => '087'],
            ['nama' => 'BANK ANTARDAERAH','kode' => '088'],
            ['nama' => 'BANK HAGA','kode' => '089'],
            ['nama' => 'BANK IFI','kode' => '093'],
            ['nama' => 'BANK CENTURY, TBK.','kode' => '095'],
            ['nama' => 'BANK MAYAPADA','kode' => '097'],
            ['nama' => 'BANK JABAR','kode' => '110'],
            ['nama' => 'BANK DKI','kode' => '111'],
            ['nama' => 'BPD DIY','kode' => '112'],
            ['nama' => 'BANK JATENG','kode' => '113'],
            ['nama' => 'BANK JATIM','kode' => '114'],
            ['nama' => 'BPD JAMBI','kode' => '115'],
            ['nama' => 'BPD ACEH','kode' => '116'],
            ['nama' => 'BANK SUMUT','kode' => '117'],
            ['nama' => 'BANK NAGARI','kode' => '118'],
            ['nama' => 'BANK RIAU','kode' => '119'],
            ['nama' => 'BANK SUMSEL','kode' => '120'],
            ['nama' => 'BANK LAMPUNG','kode' => '121'],
            ['nama' => 'BPD KALSEL','kode' => '122'],
            ['nama' => 'BPD KALIMANTAN BARAT','kode' => '123'],
            ['nama' => 'BPD KALTIM','kode' => '124'],
            ['nama' => 'BPD KALTENG','kode' => '125'],
            ['nama' => 'BPD SULSEL','kode' => '126'],
            ['nama' => 'BANK SULUT','kode' => '127'],
            ['nama' => 'BPD NTB','kode' => '128'],
            ['nama' => 'BPD BALI','kode' => '129'],
            ['nama' => 'BANK NTT','kode' => '130'],
            ['nama' => 'BANK MALUKU','kode' => '131'],
            ['nama' => 'BPD PAPUA','kode' => '132'],
            ['nama' => 'BANK BENGKULU','kode' => '133'],
            ['nama' => 'BPD SULAWESI TENGAH','kode' => '134'],
            ['nama' => 'BANK SULTRA','kode' => '135'],
            ['nama' => 'BANK NUSANTARA PARAHYANGAN','kode' => '145'],
            ['nama' => 'BANK SWADESI','kode' => '146'],
            ['nama' => 'BANK MUAMALAT','kode' => '147'],
            ['nama' => 'BANK MESTIKA','kode' => '151'],
            ['nama' => 'BANK METRO EXPRESS','kode' => '152'],
            ['nama' => 'BANK SHINTA INDONESIA','kode' => '153'],
            ['nama' => 'BANK MASPION','kode' => '157'],
            ['nama' => 'BANK HAGAKITA','kode' => '159'],
            ['nama' => 'BANK GANESHA','kode' => '161'],
            ['nama' => 'BANK WINDU KENTJANA','kode' => '162'],
            ['nama' => 'HALIM INDONESIA BANK','kode' => '164'],
            ['nama' => 'BANK HARMONI INTERNATIONAL','kode' => '166'],
            ['nama' => 'BANK KESAWAN','kode' => '167'],
            ['nama' => 'BANK TABUNGAN NEGARA (PERSERO)','kode' => '200'],
            ['nama' => 'BANK HIMPUNAN SAUDARA 1906, TBK .','kode' => '212'],
            ['nama' => 'BANK TABUNGAN PENSIUNAN NASIONAL','kode' => '213'],
            ['nama' => 'BANK SWAGUNA','kode' => '405'],
            ['nama' => 'BANK JASA ARTA','kode' => '422'],
            ['nama' => 'BANK MEGA','kode' => '426'],
            ['nama' => 'BANK JASA JAKARTA','kode' => '427'],
            ['nama' => 'BANK BUKOPIN','kode' => '441'],
            ['nama' => 'BANK SYARIAH MANDIRI','kode' => '451'],
            ['nama' => 'BANK BISNIS INTERNASIONAL','kode' => '459'],
            ['nama' => 'BANK SRI PARTHA','kode' => '466'],
            ['nama' => 'BANK JASA JAKARTA','kode' => '472'],
            ['nama' => 'BANK BINTANG MANUNGGAL','kode' => '484'],
            ['nama' => 'BANK BUMIPUTERA','kode' => '485'],
            ['nama' => 'BANK YUDHA BHAKTI','kode' => '490'],
            ['nama' => 'BANK MITRANIAGA','kode' => '491'],
            ['nama' => 'BANK AGRO NIAGA','kode' => '494'],
            ['nama' => 'BANK INDOMONEX','kode' => '498'],
            ['nama' => 'BANK ROYAL INDONESIA','kode' => '501'],
            ['nama' => 'BANK ALFINDO','kode' => '503'],
            ['nama' => 'BANK SYARIAH MEGA','kode' => '506'],
            ['nama' => 'BANK INA PERDANA','kode' => '513'],
            ['nama' => 'BANK HARFA','kode' => '517'],
            ['nama' => 'PRIMA MASTER BANK','kode' => '520'],
            ['nama' => 'BANK PERSYARIKATAN INDONESIA','kode' => '521'],
            ['nama' => 'BANK AKITA','kode' => '525'],
            ['nama' => 'LIMAN INTERNATIONAL BANK','kode' => '526'],
            ['nama' => 'ANGLOMAS INTERNASIONAL BANK','kode' => '531'],
            ['nama' => 'BANK DIPO INTERNATIONAL','kode' => '523'],
            ['nama' => 'BANK KESEJAHTERAAN EKONOMI','kode' => '535'],
            ['nama' => 'BANK UIB','kode' => '536'],
            ['nama' => 'BANK ARTOS IND','kode' => '542'],
            ['nama' => 'BANK PURBA DANARTA','kode' => '547'],
            ['nama' => 'BANK MULTI ARTA SENTOSA','kode' => '548'],
            ['nama' => 'BANK MAYORA','kode' => '553'],
            ['nama' => 'BANK INDEX SELINDO','kode' => '555'],
            ['nama' => 'BANK VICTORIA INTERNATIONAL','kode' => '566'],
            ['nama' => 'BANK EKSEKUTIF','kode' => '558'],
            ['nama' => 'CENTRATAMA NASIONAL BANK','kode' => '559'],
            ['nama' => 'BANK FAMA INTERNASIONAL','kode' => '562'],
            ['nama' => 'BANK SINAR HARAPAN BALI','kode' => '564'],
            ['nama' => 'BANK HARDA','kode' => '567'],
            ['nama' => 'BANK FINCONESIA','kode' => '945'],
            ['nama' => 'BANK MERINCORP','kode' => '946'],
            ['nama' => 'BANK MAYBANK INDOCORP','kode' => '947'],
            ['nama' => 'BANK OCBC INDONESIA','kode' => '948'],
            ['nama' => 'BANK CHINA TRUST INDONESIA','kode' => '949'],
            ['nama' => 'BANK COMMONWEALTH','kode' => '950'],
            ['nama' => 'BANK BJB SYARIAH','kode' => '425'],
            ['nama' => 'BPR KS KARYAJATNIKA SEDAYA','kode' => '688'],
            ['nama' => 'INDOSAT DOMPETKU','kode' => '789'],
            ['nama' => 'TELKOMSEL TCASH','kode' => '911'],
            ['nama' => 'LINKAJA','kode' => '911'],
        ];

        foreach ($data as $d) {
            BankModel::create($d);
        }

    }
}
