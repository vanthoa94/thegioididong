M?C L?C
+++ Table Menus +++	2
+++ Table Ads +++  -- Qu?ng c�o	4
+++ Table Branches +++  -- Chi nh�nh	5
+++ Table Agencys +++  -- ??i l�	6
+++ Table app_cate +++  -- lo?i ?ng d?ng	7
+++ Table apps +++  -- ?ng d?ng	8
+++ Table categorys +++  -- Lo?i s?n ph?m	10
+++ Table products +++  -- S?n ph?m	12
+++ Table support +++  -- h? tr?	14
+++ Table tags +++  --	15
+++ Table news_cate +++  -- lo?i tin t?c	16
+++ Table news +++  -- tin t?c	17
+++ Table order +++  -- ??n h�ng	18
+++ Table slideshows +++  -- slide	19
+++ Table videos +++  -- video	20
+++ Table website +++  -- th�ng tin website	21


+++ Table Menus +++ 




T�n c?t� ngh?aidNameT�n menuurlUrl d?n v�o trang menu. C�c menu nh? gi?i thi?u,  tuy?n d?ng,� th� url n�y s? so s�nh v?i url trong table page, n?u tr�ng th� l?y n?i dung page ra. C�c menu nh? tin t?c, video th� s? l?y trong route.IndexS?p x?p menu. S? c�ng nh? th� s? hi?n th? ??u. VD select * from menu order by indexParent_idId c?a menu cha. N?u b?ng 0 th� l� menu g?cColorM�u c?a name menu.Show_menu_topC� hi?n th? tr�n menu tr�n c�ng ko?. N?u b?ng 1 th� l� hi?n th?. B?ng 0 th� kh�ng hi?n th?Show _footerT??ng t? show_menu_top


+++ Table Ads +++  -- Qu?ng c�o


T�n c?t� ngh?aidtitle(D? ph�ng)urlUrl khi click v�o qu?ng c�o.imageH�nh ?nhpositionV? tr� ??t qu?ng c�o. VD 1 l� b�n tr�i web, 2 l� b�n ph?i web, 3 l� ? khung qu?ng c�o,�.displayC� hi?n th? hay ko? N?u b?ng 1 l� hi?n th?, 2 l� ?n. C� th? kh�ch h�ng ko mu?n hi?n th? qu?ng c�o n�y l�n website, nh?ng c?ng ko mu?n x�a ?i ?? s? d?ng l� l?n sau. Khi select ra th� ki?m tra ?i?u ki?n n�y


+++ Table Branches +++  -- Chi nh�nh




T�n c?t� ngh?aidZoneV�ng. VD: 1 l� b?c, 2 l� nam, 3 l� trungnameT�n chi nh�nhCity_nameT�n t?nh, th�nh ph?IndexS?p x?p


+++ Table Agencys +++  -- ??i l�




T�n c?t� ngh?aidBrach_idThu?c chi nh�nh n�o. Li�n k?t v?i table branchesnameT�n ??i l�address??a ch? ??i l�phoneS? ?i?n tho?i ??i l�Email(d? ph�ng)Googlemap(d? ph�ng)Display_footerC� hi?n th? d??i footer ko?


+++ Table app_cate +++  -- lo?i ?ng d?ng


Menu 2 c?p. Ch? g?m cha v� con
T�n c?t� ngh?aidnameurlparentN?u b?ng 0 th� t?c l� cha. B?ng id kh�c t?c l� con c?a id ?�IndexS?p x?pDisplayC� hi?n th? kh�ng?


+++ Table apps +++  -- ?ng d?ng


T�n c?t� ngh?aidCate_idThu?c lo?i ?ng d?ng n�o?. Li�n k?t v?i table app_catenameT�n ?ng d?ngurlUrl tr�n tr�nh duy?tDescriptionMeta descriptionKeywordsMeta keywordsimageStatusTr?ng th�i l� mi?n ph� hay c� ph� ho?c tr?ng th�i kh�c. L� ki?u varchar n�n c? hi?n th? lu�n text n�y l�nCapacityDung l??ngRequireY�u c?uVersionPhi�n b?n hi?n t?iDevelopersNh�m ph�t tri?nApp_urlurl t?i appContentN?i dung review v? appDisplayC� hi?n th? ko. N?u b?ng 1 l� hi?n th? 0 l� ?n



+++ Table categorys +++  -- Lo?i s?n ph?m



T�n c?t� ngh?aidParentN?u b?ng 0 th� l� chuy�n m?c chanameurlT�n chi nh�nhMeta_descriptionKhi v�o trang danh m?c th� add v�o metaMeta_keywordsShow_home	C� hi?n th? ? box ngo�i trang ch? ko?Sort_homeS?p x?p khi hi?n th? ngo�i trang ch?Sort_menuS?p x?p khi hi?n th? tr�n menuDisplayC� hi?n th? ko?


+++ Table products +++  -- S?n ph?m


T�n c?t� ngh?aidPro_codeM� s?n ph?mCate_idM� lo?i s?n ph?mnameurlImageH�nh ?nhImagesC�c h�nh ?nh kh�c. M?i h�nh ?nh c�ch nhau 1 d?u ,PriceGi� hi?n t?iPrice_companyGi� c�ng tyPrice_originGi� g?cDescriptionM� t? ng?n g?n v? s?n ph?m. C� th? d�ng l� meta descriptionKeywordsT? kh�a, meta keywordsStatusKi?u d? li?u l� int. VD 1 l� c�n h�ng, 2 l� h?t h�ng, 3 l� b�n ch?y, �. QuantityS? l??ngViewerL??t xemsoldS? l??ng b�n, D�ng ?? hi?n th? s?n ph?m b�n ch?yOverviewT?ng quanSpecsTh�ng s? k? thu?taccessoriesKhui h?ppromotionKhuy?n m�iDisplayC� hi?n th? kh�ngShow_homeC� hi?n th? ngo�i trang ch? kh�ngIndex_homeS?p x?p ngo�i trang ch?. Vd kh�ch h�ng mu?n s?n ph?m A l�n ??u c?a trang ch? th� s? ??i l?i index_home c�ng nh? c�ng l�n ??u. 


+++ Table support +++  -- h? tr?

T�n c?t� ngh?aidnameVD: ph�n ph?i s?, t? v?n b�n h�ng,�phoneSkypeYahooGroupNh�m. VD 1 l� ph�n ph?i, 2 l� h? tr? k? thu?tDisplayC� hi?n th? kh�ng?


+++ Table tags +++  -- 

T�n c?t� ngh?aidnameVD: ph�n ph?i s?, t? v?n b�n h�ng,�urlurl khi click v�o tagsIndexS?p x?pDisplayC� hi?n th? kh�ng. 1 l� hi?n th? 0 l� ?n


+++ Table news_cate +++  -- lo?i tin t?c


T�n c?t� ngh?aidnameurlShow_homeC� hi?n th? ngo�i trang ch? ko?DisplayC� hi?n th? kh�ng. 1 l� hi?n th? 0 l� ?n


+++ Table news +++  -- tin t?c
T�n c?t� ngh?aidCate_idLo?i tin t?cTitleTi�u ?? tin t?curlImageHotC� ph?i l� tin ti�u ?i?m?. N?u b?ng 1 th� l� tin ti�u ?i?m. 0 l� kh�ng ph?i. DescriptionM� t? ng?n v? tin t?c. meta descriptionKeywordsMeta keywordsContentN?i dung tinViewerL??t xem


+++ Table order +++  -- ??n h�ng

T�n c?t� ngh?aidUser_idM� ng??i d�ng. N?u ng??i d�ng ?� ??ng nh?p th� l?u l?i id c�n ch?a ??ng nh?p th� l?u l� 0. customer_nameN?u ng??i d�ng ??ng nh?p th� l?y d? li?u trong table user ?i?n v�o ?�y. C�n kh�ng th� ph?i t? nh?pcustomer_addresscustomer_addresscustomer_emailNoteN?i dung ??n h�ngpayment_methodPh??ng th?c thanh to�ndelivered?� giao h�ng ch?a? N?u b?ng 1 th� l� ?� giao b?ng 0 th� l� ch?a giaodelivery_dateNg�y ?� giao h�ng. D�ng b�n admin. Khi ?� giao h�ng. M?c ??nh khi m?i t?o m?i th� ?? b?ng ng�y hi?n t?i ho?c ng�y kh�cdeliverL� bi?n chu?i. t�n nh?ng ng??i giao h�ng. M?c ??nh l� tr?ng. D�ng b�n admin+++ Table slideshows +++  -- slide

T�n c?t� ngh?aidTitleD? ph�ngurlD? ph�ngImageIndexS?p x?p slideDisplayC� hi?n th? ko? B?ng 1 l� hi?n th? b?ng 0 l� ?n


+++ Table videos +++  -- video

T�n c?t� ngh?aidTitleTi�u ?? hi?n th? tr�n tab tr�nh duy?tNameT�n videourlImageSourceNgu?n video. VD 1 l� youtube, 2 l� picasa,�Video_urlurl c?a videoDisplayC� hi?n th? koViewS? l??t xem


+++ Table website +++  -- th�ng tin website


1. Title: ti�u ?? website
2. meta_description
3. meta_keywords
4. hotline
5. phone: s? ?i?n tho?i ch�nh
6. email: email ch�nh
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


