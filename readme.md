M?C L?C
+++ Table Menus +++	2
+++ Table Ads +++  -- Qu?ng cáo	4
+++ Table Branches +++  -- Chi nhánh	5
+++ Table Agencys +++  -- ??i lý	6
+++ Table app_cate +++  -- lo?i ?ng d?ng	7
+++ Table apps +++  -- ?ng d?ng	8
+++ Table categorys +++  -- Lo?i s?n ph?m	10
+++ Table products +++  -- S?n ph?m	12
+++ Table support +++  -- h? tr?	14
+++ Table tags +++  --	15
+++ Table news_cate +++  -- lo?i tin t?c	16
+++ Table news +++  -- tin t?c	17
+++ Table order +++  -- ??n hàng	18
+++ Table slideshows +++  -- slide	19
+++ Table videos +++  -- video	20
+++ Table website +++  -- thông tin website	21


+++ Table Menus +++ 




Tên c?tÝ ngh?aidNameTên menuurlUrl d?n vào trang menu. Các menu nh? gi?i thi?u,  tuy?n d?ng,… thì url nãy s? so sánh v?i url trong table page, n?u trùng thì l?y n?i dung page ra. Các menu nh? tin t?c, video thì s? l?y trong route.IndexS?p x?p menu. S? càng nh? thì s? hi?n th? ??u. VD select * from menu order by indexParent_idId c?a menu cha. N?u b?ng 0 thì là menu g?cColorMàu c?a name menu.Show_menu_topCó hi?n th? trên menu trên cùng ko?. N?u b?ng 1 thì là hi?n th?. B?ng 0 thì không hi?n th?Show _footerT??ng t? show_menu_top


+++ Table Ads +++  -- Qu?ng cáo


Tên c?tÝ ngh?aidtitle(D? phòng)urlUrl khi click vào qu?ng cáo.imageHình ?nhpositionV? trí ??t qu?ng cáo. VD 1 là bên trái web, 2 là bên ph?i web, 3 là ? khung qu?ng cáo,….displayCó hi?n th? hay ko? N?u b?ng 1 là hi?n th?, 2 là ?n. Có th? khách hàng ko mu?n hi?n th? qu?ng cáo này lên website, nh?ng c?ng ko mu?n xóa ?i ?? s? d?ng là l?n sau. Khi select ra thì ki?m tra ?i?u ki?n này


+++ Table Branches +++  -- Chi nhánh




Tên c?tÝ ngh?aidZoneVùng. VD: 1 là b?c, 2 là nam, 3 là trungnameTên chi nhánhCity_nameTên t?nh, thành ph?IndexS?p x?p


+++ Table Agencys +++  -- ??i lý




Tên c?tÝ ngh?aidBrach_idThu?c chi nhánh nào. Liên k?t v?i table branchesnameTên ??i lýaddress??a ch? ??i lýphoneS? ?i?n tho?i ??i lýEmail(d? phòng)Googlemap(d? phòng)Display_footerCó hi?n th? d??i footer ko?


+++ Table app_cate +++  -- lo?i ?ng d?ng


Menu 2 c?p. Ch? g?m cha và con
Tên c?tÝ ngh?aidnameurlparentN?u b?ng 0 thì t?c là cha. B?ng id khác t?c là con c?a id ?óIndexS?p x?pDisplayCó hi?n th? không?


+++ Table apps +++  -- ?ng d?ng


Tên c?tÝ ngh?aidCate_idThu?c lo?i ?ng d?ng nào?. Liên k?t v?i table app_catenameTên ?ng d?ngurlUrl trên trình duy?tDescriptionMeta descriptionKeywordsMeta keywordsimageStatusTr?ng thái là mi?n phí hay có phí ho?c tr?ng thái khác. Là ki?u varchar nên c? hi?n th? luôn text này lênCapacityDung l??ngRequireYêu c?uVersionPhiên b?n hi?n t?iDevelopersNhóm phát tri?nApp_urlurl t?i appContentN?i dung review v? appDisplayCó hi?n th? ko. N?u b?ng 1 là hi?n th? 0 là ?n



+++ Table categorys +++  -- Lo?i s?n ph?m



Tên c?tÝ ngh?aidParentN?u b?ng 0 thì là chuyên m?c chanameurlTên chi nhánhMeta_descriptionKhi vào trang danh m?c thì add vào metaMeta_keywordsShow_home	Có hi?n th? ? box ngoài trang ch? ko?Sort_homeS?p x?p khi hi?n th? ngoài trang ch?Sort_menuS?p x?p khi hi?n th? trên menuDisplayCó hi?n th? ko?


+++ Table products +++  -- S?n ph?m


Tên c?tÝ ngh?aidPro_codeMã s?n ph?mCate_idMã lo?i s?n ph?mnameurlImageHình ?nhImagesCác hình ?nh khác. M?i hình ?nh cách nhau 1 d?u ,PriceGiá hi?n t?iPrice_companyGiá công tyPrice_originGiá g?cDescriptionMô t? ng?n g?n v? s?n ph?m. Có th? dùng là meta descriptionKeywordsT? khóa, meta keywordsStatusKi?u d? li?u là int. VD 1 là còn hàng, 2 là h?t hàng, 3 là bán ch?y, …. QuantityS? l??ngViewerL??t xemsoldS? l??ng bán, Dùng ?? hi?n th? s?n ph?m bán ch?yOverviewT?ng quanSpecsThông s? k? thu?taccessoriesKhui h?ppromotionKhuy?n mãiDisplayCó hi?n th? khôngShow_homeCó hi?n th? ngoài trang ch? khôngIndex_homeS?p x?p ngoài trang ch?. Vd khách hàng mu?n s?n ph?m A lên ??u c?a trang ch? thì s? ??i l?i index_home càng nh? càng lên ??u. 


+++ Table support +++  -- h? tr?

Tên c?tÝ ngh?aidnameVD: phân ph?i s?, t? v?n bán hàng,…phoneSkypeYahooGroupNhóm. VD 1 là phân ph?i, 2 là h? tr? k? thu?tDisplayCó hi?n th? không?


+++ Table tags +++  -- 

Tên c?tÝ ngh?aidnameVD: phân ph?i s?, t? v?n bán hàng,…urlurl khi click vào tagsIndexS?p x?pDisplayCó hi?n th? không. 1 là hi?n th? 0 là ?n


+++ Table news_cate +++  -- lo?i tin t?c


Tên c?tÝ ngh?aidnameurlShow_homeCó hi?n th? ngoài trang ch? ko?DisplayCó hi?n th? không. 1 là hi?n th? 0 là ?n


+++ Table news +++  -- tin t?c
Tên c?tÝ ngh?aidCate_idLo?i tin t?cTitleTiêu ?? tin t?curlImageHotCó ph?i là tin tiêu ?i?m?. N?u b?ng 1 thì là tin tiêu ?i?m. 0 là không ph?i. DescriptionMô t? ng?n v? tin t?c. meta descriptionKeywordsMeta keywordsContentN?i dung tinViewerL??t xem


+++ Table order +++  -- ??n hàng

Tên c?tÝ ngh?aidUser_idMã ng??i dùng. N?u ng??i dùng ?ã ??ng nh?p thì l?u l?i id còn ch?a ??ng nh?p thì l?u là 0. customer_nameN?u ng??i dùng ??ng nh?p thì l?y d? li?u trong table user ?i?n vào ?ây. Còn không thì ph?i t? nh?pcustomer_addresscustomer_addresscustomer_emailNoteN?i dung ??n hàngpayment_methodPh??ng th?c thanh toándelivered?ã giao hàng ch?a? N?u b?ng 1 thì là ?ã giao b?ng 0 thì là ch?a giaodelivery_dateNgày ?ã giao hàng. Dùng bên admin. Khi ?ã giao hàng. M?c ??nh khi m?i t?o m?i thì ?? b?ng ngày hi?n t?i ho?c ngày khácdeliverLà bi?n chu?i. tên nh?ng ng??i giao hàng. M?c ??nh là tr?ng. Dùng bên admin+++ Table slideshows +++  -- slide

Tên c?tÝ ngh?aidTitleD? phòngurlD? phòngImageIndexS?p x?p slideDisplayCó hi?n th? ko? B?ng 1 là hi?n th? b?ng 0 là ?n


+++ Table videos +++  -- video

Tên c?tÝ ngh?aidTitleTiêu ?? hi?n th? trên tab trình duy?tNameTên videourlImageSourceNgu?n video. VD 1 là youtube, 2 là picasa,…Video_urlurl c?a videoDisplayCó hi?n th? koViewS? l??t xem


+++ Table website +++  -- thông tin website


1. Title: tiêu ?? website
2. meta_description
3. meta_keywords
4. hotline
5. phone: s? ?i?n tho?i chính
6. email: email chính
7. sdt_mua_hang_tu_xa


8. open_time

9. gio_bao_hanh
10. address

11. facebook
12. skype
13. google
14. copyright

15. giay_phep

16.  slide_top


