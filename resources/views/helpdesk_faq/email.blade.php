<div class="content"
    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; max-width: 600px; display: block; margin: 0 auto; padding: 20px;">
    <table class="main" width="100%" cellpadding="0" cellspacing="0" itemprop="action" itemscope=""
        itemtype="http://schema.org/ConfirmAction"
        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; border-radius: 3px; margin: 0; border: none;">
        <tbody>
            <tr style="font-family: 'Roboto', sans-serif; font-size: 14px; margin: 0;">
                <td class="content-wrap"
                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; color: #495057; font-size: 14px; vertical-align: top; margin: 0;padding: 30px; box-shadow: 0 3px 15px rgba(30,32,37,.06); ;border-radius: 7px; background-color: #fff;"
                    valign="top">
                    <meta itemprop="name" content="Confirm Email"
                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                    <table width="100%" cellpadding="0" cellspacing="0"
                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                        <tbody>
                            <tr style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-block" style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; vertical-align: top; margin: 0; padding: 0 0 20px;" valign="top">
                                    <div style="margin-bottom: 15px;">
                                        <img src="{{ URL::asset('assets/images/logo/onanmedia-login.png') }}" alt="" height="50%">
                                    </div>
                                </td>
                            </tr>
                            <tr
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-block"
                                    style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 20px; line-height: 1.5; font-weight: 500; vertical-align: top; margin: 0; padding: 0 0 10px;"
                                    valign="top">
                                    Kepada Yth. Bapak/Ibu {{ $mailData['penjual'] }}
                                </td>
                            </tr>
                            <tr
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td class="content-block"
                                    style="font-family: 'Roboto', sans-serif; color: #878a99; box-sizing: border-box; line-height: 1.5; font-size: 15px; vertical-align: top; margin: 0; padding: 0 0 24px;"
                                    valign="top">
                                    Berdasarkan hasil laporan dari Pembeli atas nama <strong>{{ $mailData['pembeli'] }}</strong>, kami informasikan ke pada pihak penjual agar memberikan informasi mengenai penjualan yang telah anda masukan di OnanMedia, untuk lebih lanjut silahkan mengunjungi website berikut
                                </td>
                            </tr>
                            <tr
                                style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: 14px; margin: 0;">
                                <td>
                                    <a href="{{ $mailData['url'] }}" itemprop="{{ $mailData['url'] }}"
                                        style="font-family: 'Roboto', sans-serif; box-sizing: border-box; font-size: .8125rem;font-weight: 400; color: #FFF; text-decoration: none; text-align: center; cursor: pointer; display: inline-block; border-radius: .25rem; text-transform: capitalize; background-color: #0ab39c; margin: 0; border-color: #0ab39c; border-style: solid; border-width: 1px; padding: .5rem .9rem;"
                                        onmouseover="this.style.background='#099885'"
                                        onmouseout="this.style.background='#0ab39c'">Read More →</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>
    <div style="text-align: center; margin: 0px auto;">
        <p style="font-family: 'Roboto', sans-serif; font-size: 14px;color: #98a6ad; margin: 0px;">2024 OnanMedia.com</p>
    </div>
</div>
