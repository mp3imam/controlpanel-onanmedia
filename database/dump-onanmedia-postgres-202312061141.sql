PGDMP         )                {            postgres    13.13    15.3 Y   �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                        1262    13442    postgres    DATABASE     �   CREATE DATABASE postgres WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'English_United States.1252';
    DROP DATABASE postgres;
                postgres    false                       0    0    DATABASE postgres    COMMENT     N   COMMENT ON DATABASE postgres IS 'default administrative connection database';
                   postgres    false    4352                        2615    16394    panel    SCHEMA        CREATE SCHEMA panel;
    DROP SCHEMA panel;
                postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
                postgres    false                       0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                   postgres    false    8                       0    0    SCHEMA public    ACL     T   REVOKE USAGE ON SCHEMA public FROM PUBLIC;
GRANT CREATE ON SCHEMA public TO PUBLIC;
                   postgres    false    8            "           1247    16433    Gender    TYPE     :   CREATE TYPE public."Gender" AS ENUM (
    'L',
    'P'
);
    DROP TYPE public."Gender";
       public          postgres    false    8            %           1247    16438    Hari    TYPE     �   CREATE TYPE public."Hari" AS ENUM (
    'SENIN',
    'SELASA',
    'RABU',
    'KAMIS',
    'JUMAT',
    'SABTU',
    'MINGGU'
);
    DROP TYPE public."Hari";
       public          postgres    false    8            (           1247    16454    JadwalOperasionalTokoTipe    TYPE     a   CREATE TYPE public."JadwalOperasionalTokoTipe" AS ENUM (
    'BUKA',
    'TUTUP',
    'LIBUR'
);
 .   DROP TYPE public."JadwalOperasionalTokoTipe";
       public          postgres    false    8            +           1247    16462    JasaDocType    TYPE     U   CREATE TYPE public."JasaDocType" AS ENUM (
    'FOTO',
    'VIDEO',
    'DOKUMEN'
);
     DROP TYPE public."JasaDocType";
       public          postgres    false    8            .           1247    16470    Kepuasan    TYPE     R   CREATE TYPE public."Kepuasan" AS ENUM (
    'PUAS',
    'NETRAL',
    'KECEWA'
);
    DROP TYPE public."Kepuasan";
       public          postgres    false    8            1           1247    16478    KonfirmasiPersetujuan    TYPE     R   CREATE TYPE public."KonfirmasiPersetujuan" AS ENUM (
    'TERIMA',
    'TOLAK'
);
 *   DROP TYPE public."KonfirmasiPersetujuan";
       public          postgres    false    8            4           1247    16484    LevelPenjual    TYPE     �   CREATE TYPE public."LevelPenjual" AS ENUM (
    'PowerBisnis',
    'PowerMerchantProAdvanced',
    'PowerMerchantProExpert',
    'PowerMerchantProUltimate'
);
 !   DROP TYPE public."LevelPenjual";
       public          postgres    false    8            7           1247    16494 	   LevelType    TYPE     j   CREATE TYPE public."LevelType" AS ENUM (
    'WORST',
    'BAD',
    'OK',
    'GOOD',
    'EXCELLENT'
);
    DROP TYPE public."LevelType";
       public          postgres    false    8            :           1247    16506    LingkupPekerjaanTender    TYPE     `   CREATE TYPE public."LingkupPekerjaanTender" AS ENUM (
    'LARGE',
    'MEDIUM',
    'SMALL'
);
 +   DROP TYPE public."LingkupPekerjaanTender";
       public          postgres    false    8            =           1247    16514    MetodePembayaran    TYPE     V   CREATE TYPE public."MetodePembayaran" AS ENUM (
    'SPRINT',
    'FULLPEMBAYARAN'
);
 %   DROP TYPE public."MetodePembayaran";
       public          postgres    false    8            @           1247    16520    MsAktifitasGroup    TYPE     P   CREATE TYPE public."MsAktifitasGroup" AS ENUM (
    'ORDER',
    'PENCAIRAN'
);
 %   DROP TYPE public."MsAktifitasGroup";
       public          postgres    false    8            C           1247    16526 
   MsFeeGroup    TYPE     9   CREATE TYPE public."MsFeeGroup" AS ENUM (
    'ORDER'
);
    DROP TYPE public."MsFeeGroup";
       public          postgres    false    8            F           1247    16530    ObrolanContentType    TYPE     �   CREATE TYPE public."ObrolanContentType" AS ENUM (
    'TEXT',
    'JASA',
    'PENAWARAN',
    'INVOICE',
    'GAMBAR',
    'TERTARIK',
    'STIKER'
);
 '   DROP TYPE public."ObrolanContentType";
       public          postgres    false    8            I           1247    16546    OrderHasilStatus    TYPE     s   CREATE TYPE public."OrderHasilStatus" AS ENUM (
    'KONFIRMASI',
    'DISETUJUI',
    'REVISI',
    'KOMPLAIN'
);
 %   DROP TYPE public."OrderHasilStatus";
       public          postgres    false    8            L           1247    16556 	   OrderRole    TYPE     I   CREATE TYPE public."OrderRole" AS ENUM (
    'PENJUAL',
    'PEMBELI'
);
    DROP TYPE public."OrderRole";
       public          postgres    false    8            O           1247    16562    PaymentStatus    TYPE     Y   CREATE TYPE public."PaymentStatus" AS ENUM (
    'PENDING',
    'PAID',
    'EXPIRED'
);
 "   DROP TYPE public."PaymentStatus";
       public          postgres    false    8            R           1247    16570    PencairanStatus    TYPE     Z   CREATE TYPE public."PencairanStatus" AS ENUM (
    'GAGAL',
    'SUKSES',
    'PROSES'
);
 $   DROP TYPE public."PencairanStatus";
       public          postgres    false    8            U           1247    16578    Periode    TYPE     O   CREATE TYPE public."Periode" AS ENUM (
    'HARI',
    'BULAN',
    'TAHUN'
);
    DROP TYPE public."Periode";
       public          postgres    false    8            X           1247    16586    SkillsKategori    TYPE     �   CREATE TYPE public."SkillsKategori" AS ENUM (
    'SkillPopuler',
    'SalesdanBisnisDevelopmentSistem',
    'ProductDesign',
    'Jasa'
);
 #   DROP TYPE public."SkillsKategori";
       public          postgres    false    8            [           1247    16596    SumberScorePenjual    TYPE     ]   CREATE TYPE public."SumberScorePenjual" AS ENUM (
    'ORDER',
    'REVIEW',
    'TENDER'
);
 '   DROP TYPE public."SumberScorePenjual";
       public          postgres    false    8            ^           1247    16604    TipePekerjaanTender    TYPE     S   CREATE TYPE public."TipePekerjaanTender" AS ENUM (
    'SINGLE',
    'MULTIPLE'
);
 (   DROP TYPE public."TipePekerjaanTender";
       public          postgres    false    8            a           1247    16610    VerificationMethod    TYPE     M   CREATE TYPE public."VerificationMethod" AS ENUM (
    'MAIL',
    'PHONE'
);
 '   DROP TYPE public."VerificationMethod";
       public          postgres    false    8            �            1259    16615    all_master_id_seq    SEQUENCE     y   CREATE SEQUENCE panel.all_master_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE panel.all_master_id_seq;
       panel          postgres    false    7            V           1259    33009    cl_coa    TABLE     �  CREATE TABLE panel.cl_coa (
    id character varying(191) NOT NULL,
    kdrek1 character varying(191) NOT NULL,
    kdrek2 character varying(191) NOT NULL,
    kdrek3 character varying(191) NOT NULL,
    kdrek character varying(191) NOT NULL,
    uraian character varying(191) NOT NULL,
    type character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE panel.cl_coa;
       panel         heap    postgres    false    7            �            1259    16629    cl_group_user_id_seq    SEQUENCE     |   CREATE SEQUENCE panel.cl_group_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE panel.cl_group_user_id_seq;
       panel          postgres    false    7            L           1259    32919    failed_jobs    TABLE     %  CREATE TABLE panel.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(191) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE panel.failed_jobs;
       panel         heap    postgres    false    7            K           1259    32917    failed_jobs_id_seq    SEQUENCE     z   CREATE SEQUENCE panel.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE panel.failed_jobs_id_seq;
       panel          postgres    false    332    7                       0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE panel.failed_jobs_id_seq OWNED BY panel.failed_jobs.id;
          panel          postgres    false    331            C           1259    32868 
   migrations    TABLE     �   CREATE TABLE panel.migrations (
    id integer NOT NULL,
    migration character varying(191) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE panel.migrations;
       panel         heap    postgres    false    7            B           1259    32866    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE panel.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE panel.migrations_id_seq;
       panel          postgres    false    7    323                       0    0    migrations_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE panel.migrations_id_seq OWNED BY panel.migrations.id;
          panel          postgres    false    322            S           1259    32972    model_has_permissions    TABLE     �   CREATE TABLE panel.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(191) NOT NULL,
    model_id bigint NOT NULL
);
 (   DROP TABLE panel.model_has_permissions;
       panel         heap    postgres    false    7            T           1259    32983    model_has_roles    TABLE     �   CREATE TABLE panel.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(191) NOT NULL,
    model_id bigint NOT NULL
);
 "   DROP TABLE panel.model_has_roles;
       panel         heap    postgres    false    7            D           1259    32874    password_resets    TABLE     �   CREATE TABLE panel.password_resets (
    email character varying(191) NOT NULL,
    token character varying(191) NOT NULL,
    created_at timestamp(0) without time zone
);
 "   DROP TABLE panel.password_resets;
       panel         heap    postgres    false    7            P           1259    32947    permissions    TABLE     0  CREATE TABLE panel.permissions (
    id bigint NOT NULL,
    name character varying(191) NOT NULL,
    guard_name character varying(191) NOT NULL,
    module_icon character varying(191) NOT NULL,
    module_url character varying(191) NOT NULL,
    module_parent integer DEFAULT 0,
    module_position integer DEFAULT 0,
    module_description character varying(255),
    module_status smallint DEFAULT '1'::smallint,
    is_deleted smallint DEFAULT '0'::smallint,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE panel.permissions;
       panel         heap    postgres    false    7            O           1259    32945    permissions_id_seq    SEQUENCE     z   CREATE SEQUENCE panel.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE panel.permissions_id_seq;
       panel          postgres    false    7    336                       0    0    permissions_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE panel.permissions_id_seq OWNED BY panel.permissions.id;
          panel          postgres    false    335            N           1259    32933    personal_access_tokens    TABLE     �  CREATE TABLE panel.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(191) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(191) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 )   DROP TABLE panel.personal_access_tokens;
       panel         heap    postgres    false    7            M           1259    32931    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE panel.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE panel.personal_access_tokens_id_seq;
       panel          postgres    false    334    7                       0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     ]   ALTER SEQUENCE panel.personal_access_tokens_id_seq OWNED BY panel.personal_access_tokens.id;
          panel          postgres    false    333            U           1259    32994    role_has_permissions    TABLE     l   CREATE TABLE panel.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);
 '   DROP TABLE panel.role_has_permissions;
       panel         heap    postgres    false    7            R           1259    32964    roles    TABLE     �   CREATE TABLE panel.roles (
    id bigint NOT NULL,
    name character varying(191) NOT NULL,
    guard_name character varying(191) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE panel.roles;
       panel         heap    postgres    false    7            Q           1259    32962    roles_id_seq    SEQUENCE     t   CREATE SEQUENCE panel.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 "   DROP SEQUENCE panel.roles_id_seq;
       panel          postgres    false    7    338                       0    0    roles_id_seq    SEQUENCE OWNED BY     ;   ALTER SEQUENCE panel.roles_id_seq OWNED BY panel.roles.id;
          panel          postgres    false    337            �            1259    16644    tbl_belanja_header_seq    SEQUENCE     �   CREATE SEQUENCE panel.tbl_belanja_header_seq
    START WITH 394
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 ,   DROP SEQUENCE panel.tbl_belanja_header_seq;
       panel          postgres    false    7            �            1259    16677    tbl_jurnal_header_seq    SEQUENCE     �   CREATE SEQUENCE panel.tbl_jurnal_header_seq
    START WITH 27
    INCREMENT BY 1
    NO MINVALUE
    MAXVALUE 999999
    CACHE 1
    CYCLE;
 +   DROP SEQUENCE panel.tbl_jurnal_header_seq;
       panel          postgres    false    7            �            1259    16679    tbl_kas_detail_seq    SEQUENCE     z   CREATE SEQUENCE panel.tbl_kas_detail_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE panel.tbl_kas_detail_seq;
       panel          postgres    false    7            �            1259    16685    tbl_kas_header_seq    SEQUENCE     z   CREATE SEQUENCE panel.tbl_kas_header_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE panel.tbl_kas_header_seq;
       panel          postgres    false    7            W           1259    33017    tbl_user    TABLE       CREATE TABLE panel.tbl_user (
    id character varying(191) NOT NULL,
    username character varying(100) NOT NULL,
    password character varying(200) NOT NULL,
    cl_user_group_id integer NOT NULL,
    nama_lengkap character varying(200) NOT NULL,
    status character varying(1) NOT NULL,
    cl_perusahaan_id integer NOT NULL,
    update_date timestamp(0) without time zone NOT NULL,
    update_by character varying(100) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE panel.tbl_user;
       panel         heap    postgres    false    7            �            1259    16694    tbl_user_id_seq    SEQUENCE     w   CREATE SEQUENCE panel.tbl_user_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 %   DROP SEQUENCE panel.tbl_user_id_seq;
       panel          postgres    false    7            �            1259    16708    tbl_user_menu_id_seq    SEQUENCE     |   CREATE SEQUENCE panel.tbl_user_menu_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE panel.tbl_user_menu_id_seq;
       panel          postgres    false    7            F           1259    32880    telescope_entries    TABLE     Q  CREATE TABLE panel.telescope_entries (
    sequence bigint NOT NULL,
    uuid uuid NOT NULL,
    batch_id uuid NOT NULL,
    family_hash character varying(191),
    should_display_on_index boolean DEFAULT true NOT NULL,
    type character varying(20) NOT NULL,
    content text NOT NULL,
    created_at timestamp(0) without time zone
);
 $   DROP TABLE panel.telescope_entries;
       panel         heap    postgres    false    7            E           1259    32878    telescope_entries_sequence_seq    SEQUENCE     �   CREATE SEQUENCE panel.telescope_entries_sequence_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE panel.telescope_entries_sequence_seq;
       panel          postgres    false    326    7            	           0    0    telescope_entries_sequence_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE panel.telescope_entries_sequence_seq OWNED BY panel.telescope_entries.sequence;
          panel          postgres    false    325            G           1259    32896    telescope_entries_tags    TABLE     u   CREATE TABLE panel.telescope_entries_tags (
    entry_uuid uuid NOT NULL,
    tag character varying(191) NOT NULL
);
 )   DROP TABLE panel.telescope_entries_tags;
       panel         heap    postgres    false    7            H           1259    32906    telescope_monitoring    TABLE     U   CREATE TABLE panel.telescope_monitoring (
    tag character varying(191) NOT NULL
);
 '   DROP TABLE panel.telescope_monitoring;
       panel         heap    postgres    false    7            J           1259    32911    verifybackup    TABLE     p   CREATE TABLE panel.verifybackup (
    id integer NOT NULL,
    verify_status character varying(191) NOT NULL
);
    DROP TABLE panel.verifybackup;
       panel         heap    postgres    false    7            I           1259    32909    verifybackup_id_seq    SEQUENCE     �   CREATE SEQUENCE panel.verifybackup_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE panel.verifybackup_id_seq;
       panel          postgres    false    7    330            
           0    0    verifybackup_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE panel.verifybackup_id_seq OWNED BY panel.verifybackup.id;
          panel          postgres    false    329            �            1259    19139    AccessToken    TABLE     �  CREATE TABLE public."AccessToken" (
    id character varying(255) NOT NULL,
    expireln integer NOT NULL,
    "expireAt" timestamp(3) without time zone NOT NULL,
    token text NOT NULL,
    bank text NOT NULL,
    original jsonb NOT NULL,
    signature text,
    "timestamp" text,
    "refreshToken" text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public."AccessToken";
       public         heap    postgres    false    8            �            1259    19147    Account    TABLE     �  CREATE TABLE public."Account" (
    id character varying(255) NOT NULL,
    "userId" text NOT NULL,
    type text NOT NULL,
    provider text NOT NULL,
    "providerAccountId" text NOT NULL,
    refresh_token text,
    access_token text,
    expires_at integer,
    token_type text,
    scope text,
    id_token text,
    session_state text,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public."Account";
       public         heap    postgres    false    8            �            1259    19155    BatalTenderProposal    TABLE     #  CREATE TABLE public."BatalTenderProposal" (
    id character varying(255) NOT NULL,
    alasan text NOT NULL,
    "msAlasanPembatalanTenderId" text NOT NULL,
    "tenderPesertaId" text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 )   DROP TABLE public."BatalTenderProposal";
       public         heap    postgres    false    8            �            1259    19163    Jasa    TABLE     �  CREATE TABLE public."Jasa" (
    id character varying(255) NOT NULL,
    nama text NOT NULL,
    "msSubkategoriId" integer NOT NULL,
    "msKategoriId" integer NOT NULL,
    tags text NOT NULL,
    impresi integer DEFAULT 0 NOT NULL,
    klik integer DEFAULT 0 NOT NULL,
    "userId" text NOT NULL,
    deskripsi text NOT NULL,
    cover text NOT NULL,
    slug text NOT NULL,
    "hargaTermahal" integer NOT NULL,
    "hargaTermurah" integer NOT NULL,
    "msStatusJasaId" integer DEFAULT 2 NOT NULL,
    "isPengambilan" integer DEFAULT 0 NOT NULL,
    "isPengiriman" integer DEFAULT 0 NOT NULL,
    "isUnggulan" integer DEFAULT 0 NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public."Jasa";
       public         heap    postgres    false    8            �            1259    19177    JasaDiskusi    TABLE       CREATE TABLE public."JasaDiskusi" (
    id character varying(255) NOT NULL,
    isi character varying(255) NOT NULL,
    "jasaId" text NOT NULL,
    "userId" text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 !   DROP TABLE public."JasaDiskusi";
       public         heap    postgres    false    8            �            1259    19185    JasaDiskusiBalasan    TABLE     7  CREATE TABLE public."JasaDiskusiBalasan" (
    id character varying(255) NOT NULL,
    isi character varying(255) NOT NULL,
    "jasaDiskusiId" text NOT NULL,
    "jasaId" text NOT NULL,
    "userId" text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 (   DROP TABLE public."JasaDiskusiBalasan";
       public         heap    postgres    false    8            �            1259    19193    JasaDoc    TABLE       CREATE TABLE public."JasaDoc" (
    id character varying(255) NOT NULL,
    url character varying(255) NOT NULL,
    tipe text NOT NULL,
    "fileName" text,
    "jasaId" text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public."JasaDoc";
       public         heap    postgres    false    8            �            1259    19201    JasaFaq    TABLE     �   CREATE TABLE public."JasaFaq" (
    id character varying(255) NOT NULL,
    pertanyaan text NOT NULL,
    jawaban text NOT NULL,
    "jasaId" text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public."JasaFaq";
       public         heap    postgres    false    8            �            1259    19210    JasaPricing    TABLE     p  CREATE TABLE public."JasaPricing" (
    id text NOT NULL,
    "jasaId" text NOT NULL,
    nama text NOT NULL,
    deskripsi text NOT NULL,
    "jumlahPeriode" integer NOT NULL,
    periode public."Periode" NOT NULL,
    harga integer NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 !   DROP TABLE public."JasaPricing";
       public         heap    postgres    false    8    853            �            1259    19217    JasaRequirement    TABLE       CREATE TABLE public."JasaRequirement" (
    id text NOT NULL,
    pertanyaan text NOT NULL,
    jawaban text,
    "jasaId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    tipe text NOT NULL
);
 %   DROP TABLE public."JasaRequirement";
       public         heap    postgres    false    8            �            1259    19224 
   JasaReview    TABLE     �  CREATE TABLE public."JasaReview" (
    id text NOT NULL,
    rating numeric(4,2) NOT NULL,
    review character varying(300),
    "orderId" text NOT NULL,
    foto text[],
    "jasaId" text NOT NULL,
    "userId" text NOT NULL,
    kepuasan public."Kepuasan",
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "orderJasaId" text NOT NULL
);
     DROP TABLE public."JasaReview";
       public         heap    postgres    false    814    8            �            1259    19231    JasaReviewDetail    TABLE     �   CREATE TABLE public."JasaReviewDetail" (
    id text NOT NULL,
    "msReviewPointId" bigint NOT NULL,
    "jasaReviewId" text NOT NULL,
    rating integer NOT NULL
);
 &   DROP TABLE public."JasaReviewDetail";
       public         heap    postgres    false    8            �            1259    19237    JasaReviewPointSummary    VIEW     G  CREATE VIEW public."JasaReviewPointSummary" AS
 SELECT a."msReviewPointId",
    a.rating,
    count(*) AS jumlah,
    b."jasaId"
   FROM (public."JasaReviewDetail" a
     JOIN public."JasaReview" b ON ((a."jasaReviewId" = b.id)))
  GROUP BY b."jasaId", a."msReviewPointId", a.rating
  ORDER BY b."jasaId", a."msReviewPointId";
 +   DROP VIEW public."JasaReviewPointSummary";
       public          postgres    false    232    232    231    231    232    8            �            1259    19241    JasaReviewSummary    VIEW     �   CREATE VIEW public."JasaReviewSummary" AS
 SELECT (round(avg("JasaReview".rating), 1))::text AS rating,
    (count(*))::integer AS "jumlahRating",
    "JasaReview"."jasaId"
   FROM public."JasaReview"
  GROUP BY "JasaReview"."jasaId";
 &   DROP VIEW public."JasaReviewSummary";
       public          postgres    false    231    231    8            �            1259    19245    Order    TABLE     �  CREATE TABLE public."Order" (
    id text NOT NULL,
    nomor text,
    penawaran text NOT NULL,
    "msAktifitasId" integer NOT NULL,
    "masaBerlaku" integer,
    "isNeedRequirement" integer DEFAULT 0,
    "userIdPenjual" text NOT NULL,
    "userIdPembeli" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "totalPenawaran" integer NOT NULL,
    "totalFee" integer NOT NULL,
    "totalBayar" integer NOT NULL,
    "persentaseKomisiOnan" double precision NOT NULL,
    "totalKomisiOnan" integer NOT NULL,
    "totalKomisiPenjual" integer NOT NULL,
    "currentTerminId" text,
    "jumlahTermin" integer NOT NULL,
    "saldoDigunakan" integer DEFAULT 0,
    "isNeedPengiriman" integer DEFAULT 0,
    "totalOngkir" integer DEFAULT 0,
    "totalOrder" integer DEFAULT 0,
    "orderHasilId" text,
    "confirmBefore" timestamp(3) without time zone,
    "msPaymentMethodId" integer
);
    DROP TABLE public."Order";
       public         heap    postgres    false    8            �            1259    19257 	   OrderJasa    TABLE     �  CREATE TABLE public."OrderJasa" (
    id text NOT NULL,
    nama text NOT NULL,
    deskripsi text NOT NULL,
    "orderId" text NOT NULL,
    foto text[],
    "namaPricing" text NOT NULL,
    "jasaId" text NOT NULL,
    "isReviewed" integer DEFAULT 0,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    nilai integer NOT NULL
);
    DROP TABLE public."OrderJasa";
       public         heap    postgres    false    8            �            1259    19265    JasaStatistikView    VIEW     �  CREATE VIEW public."JasaStatistikView" AS
 WITH jumlah_pembatalan AS (
         SELECT count(*) AS jumlah,
            a_1."jasaId"
           FROM (public."OrderJasa" a_1
             JOIN public."Order" b_1 ON ((a_1."orderId" = b_1.id)))
          WHERE (b_1."msAktifitasId" = ANY (ARRAY[1009, 1002, 1011]))
          GROUP BY a_1."jasaId"
        ), jumlah_order AS (
         SELECT count(*) AS jumlah,
            a_1."jasaId"
           FROM (public."OrderJasa" a_1
             JOIN public."Order" b_1 ON ((a_1."orderId" = b_1.id)))
          WHERE (b_1."msAktifitasId" <> ALL (ARRAY[1009, 1002, 1011]))
          GROUP BY a_1."jasaId"
        )
 SELECT a.klik,
    a.impresi,
    a.id,
    COALESCE(c.jumlah, (0)::bigint) AS "order",
    COALESCE(b.jumlah, (0)::bigint) AS pembatalan
   FROM ((public."Jasa" a
     LEFT JOIN jumlah_pembatalan b ON (((a.id)::text = b."jasaId")))
     LEFT JOIN jumlah_order c ON (((a.id)::text = c."jasaId")));
 &   DROP VIEW public."JasaStatistikView";
       public          postgres    false    224    224    224    235    236    236    235    8            �            1259    19270    MsAktifitas    TABLE     �  CREATE TABLE public."MsAktifitas" (
    id integer NOT NULL,
    nama text NOT NULL,
    "namaDiPenjual" text NOT NULL,
    "namaDiPembeli" text NOT NULL,
    "group" public."MsAktifitasGroup" NOT NULL,
    "jawabanDariAktifitas" integer,
    "order" integer,
    keterangan text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    role public."OrderRole",
    "nextAktifitas" integer
);
 !   DROP TABLE public."MsAktifitas";
       public         heap    postgres    false    8    832    844            �            1259    19277    MsAlasanPembatalanTender    TABLE     �   CREATE TABLE public."MsAlasanPembatalanTender" (
    id text NOT NULL,
    nama text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 .   DROP TABLE public."MsAlasanPembatalanTender";
       public         heap    postgres    false    8            �            1259    19284    MsBahasa    TABLE     }   CREATE TABLE public."MsBahasa" (
    id bigint NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL
);
    DROP TABLE public."MsBahasa";
       public         heap    postgres    false    8            �            1259    19291    MsBank    TABLE     �   CREATE TABLE public."MsBank" (
    id integer NOT NULL,
    nama text NOT NULL,
    kode text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL,
    icon text
);
    DROP TABLE public."MsBank";
       public         heap    postgres    false    8            �            1259    19298    MsFee    TABLE     �   CREATE TABLE public."MsFee" (
    id integer NOT NULL,
    nama text NOT NULL,
    nilai integer NOT NULL,
    persen integer DEFAULT 0,
    "isAktif" integer DEFAULT 1,
    "group" public."MsFeeGroup" NOT NULL
);
    DROP TABLE public."MsFee";
       public         heap    postgres    false    835    8            �            1259    19306 
   MsKategori    TABLE     �   CREATE TABLE public."MsKategori" (
    id bigint NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL,
    url text,
    icon text NOT NULL
);
     DROP TABLE public."MsKategori";
       public         heap    postgres    false    8            �            1259    19313    MsKota    TABLE     �   CREATE TABLE public."MsKota" (
    id integer NOT NULL,
    nama text NOT NULL,
    "msProvinsiId" integer NOT NULL,
    tipe text NOT NULL,
    "kodePos" text NOT NULL
);
    DROP TABLE public."MsKota";
       public         heap    postgres    false    8            �            1259    19319    MsKurir    TABLE     �   CREATE TABLE public."MsKurir" (
    id integer NOT NULL,
    "isAktif" integer DEFAULT 1,
    nama text NOT NULL,
    icon text NOT NULL,
    info text,
    kode text
);
    DROP TABLE public."MsKurir";
       public         heap    postgres    false    8            �            1259    19326    MsKurirLayanan    TABLE     �   CREATE TABLE public."MsKurirLayanan" (
    id integer NOT NULL,
    "msKurirId" integer NOT NULL,
    "isAktif" integer DEFAULT 1,
    nama text NOT NULL
);
 $   DROP TABLE public."MsKurirLayanan";
       public         heap    postgres    false    8            �            1259    19333    MsMerchantLevel    TABLE     H  CREATE TABLE public."MsMerchantLevel" (
    id integer NOT NULL,
    nama text NOT NULL,
    "minScore" integer NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    deskripsi text,
    tos text,
    "updatedAt" timestamp(3) without time zone,
    "isAktif" integer DEFAULT 1,
    icon text
);
 %   DROP TABLE public."MsMerchantLevel";
       public         heap    postgres    false    8            �            1259    19341    MsMerchantLevelBenefit    TABLE     '  CREATE TABLE public."MsMerchantLevelBenefit" (
    id integer NOT NULL,
    "msMerchantLevelId" integer NOT NULL,
    nama text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "isAktif" integer DEFAULT 1
);
 ,   DROP TABLE public."MsMerchantLevelBenefit";
       public         heap    postgres    false    8            �            1259    19349    MsNegara    TABLE     �   CREATE TABLE public."MsNegara" (
    id bigint NOT NULL,
    nama text NOT NULL,
    status integer DEFAULT 1,
    kode text
);
    DROP TABLE public."MsNegara";
       public         heap    postgres    false    8            �            1259    19356    MsNotifikasi    TABLE     �   CREATE TABLE public."MsNotifikasi" (
    id integer NOT NULL,
    nama text NOT NULL,
    "msGroupNotifikasi" integer NOT NULL,
    "msKeahlianId" integer,
    "isAktif" integer DEFAULT 1
);
 "   DROP TABLE public."MsNotifikasi";
       public         heap    postgres    false    8            �            1259    19363    MsNotifikasiGroup    TABLE     ]   CREATE TABLE public."MsNotifikasiGroup" (
    id integer NOT NULL,
    nama text NOT NULL
);
 '   DROP TABLE public."MsNotifikasiGroup";
       public         heap    postgres    false    8            �            1259    19369    MsPaymentMethod    TABLE     �   CREATE TABLE public."MsPaymentMethod" (
    id integer NOT NULL,
    nama text NOT NULL,
    method text NOT NULL,
    bank text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL,
    icon text
);
 %   DROP TABLE public."MsPaymentMethod";
       public         heap    postgres    false    8            �            1259    19376    MsPekerjaan    TABLE     t   CREATE TABLE public."MsPekerjaan" (
    id bigint NOT NULL,
    status integer DEFAULT 1,
    nama text NOT NULL
);
 !   DROP TABLE public."MsPekerjaan";
       public         heap    postgres    false    8            �            1259    19383    MsPostingTender    TABLE     �   CREATE TABLE public."MsPostingTender" (
    id text NOT NULL,
    nama text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP
);
 %   DROP TABLE public."MsPostingTender";
       public         heap    postgres    false    8            �            1259    19390 
   MsProvinsi    TABLE     V   CREATE TABLE public."MsProvinsi" (
    id integer NOT NULL,
    nama text NOT NULL
);
     DROP TABLE public."MsProvinsi";
       public         heap    postgres    false    8                        1259    19396    MsReviewPoint    TABLE     �   CREATE TABLE public."MsReviewPoint" (
    id bigint NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL
);
 #   DROP TABLE public."MsReviewPoint";
       public         heap    postgres    false    8                       1259    19403    MsStatusAkun    TABLE     �   CREATE TABLE public."MsStatusAkun" (
    id integer NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL
);
 "   DROP TABLE public."MsStatusAkun";
       public         heap    postgres    false    8                       1259    19410    MsStatusJasa    TABLE     �   CREATE TABLE public."MsStatusJasa" (
    id integer NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL
);
 "   DROP TABLE public."MsStatusJasa";
       public         heap    postgres    false    8                       1259    19417    MsStatusSeller    TABLE     �   CREATE TABLE public."MsStatusSeller" (
    id integer NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL
);
 $   DROP TABLE public."MsStatusSeller";
       public         heap    postgres    false    8                       1259    19424    MsStatusTender    TABLE     �   CREATE TABLE public."MsStatusTender" (
    id integer NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL
);
 $   DROP TABLE public."MsStatusTender";
       public         heap    postgres    false    8                       1259    19431    MsSubkategori    TABLE     �   CREATE TABLE public."MsSubkategori" (
    id bigint NOT NULL,
    nama text NOT NULL,
    "isAktif" integer DEFAULT 1 NOT NULL,
    "msKategoriId" bigint NOT NULL,
    url text,
    icon text NOT NULL,
    background text NOT NULL
);
 #   DROP TABLE public."MsSubkategori";
       public         heap    postgres    false    8                       1259    19438    MsTingkatEdukasi    TABLE     y   CREATE TABLE public."MsTingkatEdukasi" (
    id bigint NOT NULL,
    nama text NOT NULL,
    status integer DEFAULT 1
);
 &   DROP TABLE public."MsTingkatEdukasi";
       public         heap    postgres    false    8                       1259    19445    Notification    TABLE     �  CREATE TABLE public."Notification" (
    id text NOT NULL,
    "senderUserId" text NOT NULL,
    "targetUserId" text NOT NULL,
    title text NOT NULL,
    isi text,
    url text,
    tipe text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "isRead" integer DEFAULT 0 NOT NULL,
    role public."OrderRole"
);
 "   DROP TABLE public."Notification";
       public         heap    postgres    false    8    844                       1259    19453    Obrolan    TABLE     �   CREATE TABLE public."Obrolan" (
    id text NOT NULL,
    "userIds" text[],
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "userId" text
);
    DROP TABLE public."Obrolan";
       public         heap    postgres    false    8            	           1259    19460    ObrolanContent    TABLE     f  CREATE TABLE public."ObrolanContent" (
    id text NOT NULL,
    "obrolanId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    isi text NOT NULL,
    status integer DEFAULT 0,
    "userId" text NOT NULL,
    tipe public."ObrolanContentType" DEFAULT 'TEXT'::public."ObrolanContentType" NOT NULL,
    detail jsonb
);
 $   DROP TABLE public."ObrolanContent";
       public         heap    postgres    false    838    838    8            
           1259    19469    ObrolanList    VIEW     J  CREATE VIEW public."ObrolanList" AS
 WITH latest_chat AS (
         SELECT max("ObrolanContent"."createdAt") AS "createdAt",
            "ObrolanContent"."obrolanId"
           FROM public."ObrolanContent"
          GROUP BY "ObrolanContent"."obrolanId"
        )
 SELECT a."createdAt",
    a."obrolanId",
        CASE
            WHEN (b.tipe = 'PENAWARAN'::public."ObrolanContentType") THEN 'Mengirim Penawaran'::text
            WHEN (b.tipe = 'JASA'::public."ObrolanContentType") THEN 'Mengirim Jasa'::text
            ELSE b.isi
        END AS isi,
    b."userId",
    b.tipe,
    b.status,
    b.id,
    c."userIds"
   FROM ((latest_chat a
     JOIN public."ObrolanContent" b ON (((a."obrolanId" = b."obrolanId") AND (a."createdAt" = b."createdAt"))))
     JOIN public."Obrolan" c ON ((a."obrolanId" = c.id)))
  ORDER BY a."createdAt";
     DROP VIEW public."ObrolanList";
       public          postgres    false    265    265    265    838    265    265    264    265    264    265    838    8            �            1259    17053    OrdSeq    SEQUENCE     q   CREATE SEQUENCE public."OrdSeq"
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
    DROP SEQUENCE public."OrdSeq";
       public          postgres    false    8                       1259    19474    OrderAktifitas    TABLE     A  CREATE TABLE public."OrderAktifitas" (
    id text NOT NULL,
    "orderId" text NOT NULL,
    "msAktifitasId" integer NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    urutan integer,
    "userId" text,
    attachments text[],
    "orderTerminId" text NOT NULL,
    komentar text
);
 $   DROP TABLE public."OrderAktifitas";
       public         heap    postgres    false    8                       1259    19481    OrderFee    TABLE       CREATE TABLE public."OrderFee" (
    id text NOT NULL,
    nama text NOT NULL,
    nilai integer NOT NULL,
    "orderId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
    DROP TABLE public."OrderFee";
       public         heap    postgres    false    8                       1259    19488 
   OrderHasil    TABLE     �  CREATE TABLE public."OrderHasil" (
    id text NOT NULL,
    url text NOT NULL,
    "orderId" text NOT NULL,
    keterangan text,
    status public."OrderHasilStatus" DEFAULT 'KONFIRMASI'::public."OrderHasilStatus" NOT NULL,
    komentar text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "terminId" text NOT NULL
);
     DROP TABLE public."OrderHasil";
       public         heap    postgres    false    841    8    841                       1259    19496    OrderHasilAttachment    TABLE       CREATE TABLE public."OrderHasilAttachment" (
    id text NOT NULL,
    filename text NOT NULL,
    url text NOT NULL,
    "orderHasilId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 *   DROP TABLE public."OrderHasilAttachment";
       public         heap    postgres    false    8                       1259    19503    OrderJasaKepuasan    TABLE     >  CREATE TABLE public."OrderJasaKepuasan" (
    id text NOT NULL,
    "orderJasaId" text NOT NULL,
    kepuasan text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    sebagai public."OrderRole" NOT NULL,
    "userId" text NOT NULL
);
 '   DROP TABLE public."OrderJasaKepuasan";
       public         heap    postgres    false    8    844                       1259    19510    OrderPayment    TABLE     &  CREATE TABLE public."OrderPayment" (
    id text NOT NULL,
    "orderId" text NOT NULL,
    status text NOT NULL,
    amount integer NOT NULL,
    url text,
    "expiredAt" timestamp(3) without time zone NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "paidAt" timestamp(3) without time zone,
    method text,
    channel text,
    destination text,
    "updatedAt" timestamp(3) without time zone,
    "payerEmail" text NOT NULL,
    original jsonb NOT NULL,
    "orderTerminId" text,
    "billNumber" text
);
 "   DROP TABLE public."OrderPayment";
       public         heap    postgres    false    8                       1259    19517    OrderPaymentHistory    TABLE     �   CREATE TABLE public."OrderPaymentHistory" (
    id text NOT NULL,
    status text NOT NULL,
    "createdAt" timestamp(3) without time zone NOT NULL,
    "orderId" text NOT NULL,
    original jsonb NOT NULL
);
 )   DROP TABLE public."OrderPaymentHistory";
       public         heap    postgres    false    8                       1259    19523    OrderPengiriman    TABLE     �  CREATE TABLE public."OrderPengiriman" (
    id text NOT NULL,
    "orderId" text NOT NULL,
    status integer DEFAULT 1,
    "pengirimPhone" text NOT NULL,
    "pengirimKota" text NOT NULL,
    "pengirimProvinsi" text NOT NULL,
    "pengirimKodePos" text NOT NULL,
    "pengirimNama" text NOT NULL,
    "penerimaPhone" text NOT NULL,
    "penerimaKota" text NOT NULL,
    "penerimaProvinsi" text NOT NULL,
    "penerimaKodePos" text NOT NULL,
    "penerimaNama" text NOT NULL,
    kurir text NOT NULL,
    servis text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "penerimaAlamat" text NOT NULL,
    "pengirimAlamat" text NOT NULL
);
 %   DROP TABLE public."OrderPengiriman";
       public         heap    postgres    false    8                       1259    19531    OrderTermin    TABLE     �  CREATE TABLE public."OrderTermin" (
    id text NOT NULL,
    "terminKe" integer NOT NULL,
    "orderId" text NOT NULL,
    pencapaian text NOT NULL,
    nilai integer NOT NULL,
    "jumlahRevisi" integer NOT NULL,
    "jumlahPeriode" integer NOT NULL,
    periode public."Periode" NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "isSelesai" integer DEFAULT 0,
    "startDate" timestamp(3) without time zone,
    "finishedDate" timestamp(3) without time zone,
    "nilaiOnan" integer DEFAULT 0 NOT NULL,
    "nilaiPenjual" integer DEFAULT 0 NOT NULL
);
 !   DROP TABLE public."OrderTermin";
       public         heap    postgres    false    8    853                       1259    19541 	   Pencairan    TABLE     �  CREATE TABLE public."Pencairan" (
    id text NOT NULL,
    nilai integer NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    keterangan text,
    "userId" text NOT NULL,
    "namaRekening" text NOT NULL,
    rekening text,
    "msBankId" integer NOT NULL,
    status public."PencairanStatus" DEFAULT 'PROSES'::public."PencairanStatus" NOT NULL,
    "terminId" text
);
    DROP TABLE public."Pencairan";
       public         heap    postgres    false    850    850    8                       1259    19549    Saldo    TABLE       CREATE TABLE public."Saldo" (
    id text NOT NULL,
    debit integer DEFAULT 0,
    kredit integer DEFAULT 0,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    keterangan text NOT NULL,
    "userId" text NOT NULL,
    ref text
);
    DROP TABLE public."Saldo";
       public         heap    postgres    false    8                       1259    19558    PencairanSaldoView    VIEW     #  CREATE VIEW public."PencairanSaldoView" AS
 SELECT x.id,
    x.debit,
    x.kredit,
    x."createdAt",
    x.keterangan,
    x."userId",
    x.ref,
    x.status
   FROM ( SELECT "Saldo".id,
            "Saldo".debit,
            "Saldo".kredit,
            "Saldo"."createdAt",
            "Saldo".keterangan,
            "Saldo"."userId",
            "Saldo".ref,
            NULL::public."PencairanStatus" AS status
           FROM public."Saldo"
        UNION ALL
         SELECT p.id,
            p.nilai AS debit,
            0 AS kredit,
            p."createdAt",
            p.keterangan,
            p."userId",
            NULL::text AS ref,
            p.status
           FROM public."Pencairan" p
          WHERE (p.status = 'PROSES'::public."PencairanStatus")) x
  ORDER BY x."createdAt";
 '   DROP VIEW public."PencairanSaldoView";
       public          postgres    false    277    850    276    276    276    276    276    276    277    277    277    277    277    277    850    8                       1259    19563    Penghasilan    TABLE     �   CREATE TABLE public."Penghasilan" (
    id text NOT NULL,
    "mataUang" integer NOT NULL,
    pendapatan integer NOT NULL,
    waktu text NOT NULL
);
 !   DROP TABLE public."Penghasilan";
       public         heap    postgres    false    8                       1259    19569    PenjualPengaturanCatatan    TABLE     �   CREATE TABLE public."PenjualPengaturanCatatan" (
    id text NOT NULL,
    judul text NOT NULL,
    isi text NOT NULL,
    "userId" text NOT NULL
);
 .   DROP TABLE public."PenjualPengaturanCatatan";
       public         heap    postgres    false    8                       1259    19575    PenjualPengaturanJadwalLibur    TABLE     +  CREATE TABLE public."PenjualPengaturanJadwalLibur" (
    id text NOT NULL,
    "tglMulaiLibur" date NOT NULL,
    "tglSelesaiLibur" date NOT NULL,
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 2   DROP TABLE public."PenjualPengaturanJadwalLibur";
       public         heap    postgres    false    8                       1259    19582 "   PenjualPengaturanJadwalOperasional    TABLE     0  CREATE TABLE public."PenjualPengaturanJadwalOperasional" (
    id text NOT NULL,
    tipe public."JadwalOperasionalTokoTipe" NOT NULL,
    "jamBuka" text,
    "jamTutup" text,
    hari public."Hari",
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP
);
 8   DROP TABLE public."PenjualPengaturanJadwalOperasional";
       public         heap    postgres    false    8    808    805                       1259    19589    PenjualPengaturanPengiriman    TABLE     �  CREATE TABLE public."PenjualPengaturanPengiriman" (
    id text NOT NULL,
    "userId" text NOT NULL,
    "msKotaId" integer NOT NULL,
    "msProvinsiId" integer NOT NULL,
    alamat text NOT NULL,
    "catatanKurir" text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    label text NOT NULL,
    lat text,
    long text,
    phone text NOT NULL,
    "updatedAt" timestamp(3) without time zone,
    "userAlamatId" text
);
 1   DROP TABLE public."PenjualPengaturanPengiriman";
       public         heap    postgres    false    8                       1259    19596 !   PenjualPengaturanPengirimanDetail    TABLE     �   CREATE TABLE public."PenjualPengaturanPengirimanDetail" (
    id text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "msKurirId" integer NOT NULL,
    "penjualPengaturanPengirimanId" text NOT NULL
);
 7   DROP TABLE public."PenjualPengaturanPengirimanDetail";
       public         heap    postgres    false    8                       1259    19603    PenjualPengaturanProdukUnggulan    TABLE     �   CREATE TABLE public."PenjualPengaturanProdukUnggulan" (
    id text NOT NULL,
    "userId" text NOT NULL,
    "jasaId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP
);
 5   DROP TABLE public."PenjualPengaturanProdukUnggulan";
       public         heap    postgres    false    8                       1259    19610     PenjualPengaturanTemplateBalasan    TABLE     /  CREATE TABLE public."PenjualPengaturanTemplateBalasan" (
    id text NOT NULL,
    isi text NOT NULL,
    "userId" text NOT NULL,
    "isAktif" integer DEFAULT 0,
    judul text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 6   DROP TABLE public."PenjualPengaturanTemplateBalasan";
       public         heap    postgres    false    8                       1259    19618    PenjualScore    TABLE       CREATE TABLE public."PenjualScore" (
    id text NOT NULL,
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    point integer NOT NULL,
    ref text,
    aktifitas public."SumberScorePenjual" NOT NULL
);
 "   DROP TABLE public."PenjualScore";
       public         heap    postgres    false    859    8                        1259    19625 
   Portofolio    TABLE       CREATE TABLE public."Portofolio" (
    id text NOT NULL,
    "tenderPesertaId" text,
    "fileName" text NOT NULL,
    url text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
     DROP TABLE public."Portofolio";
       public         heap    postgres    false    8            !           1259    19632    ProgresPeserta    TABLE       CREATE TABLE public."ProgresPeserta" (
    id integer NOT NULL,
    "userId" text NOT NULL,
    "tenderPesertaId" text NOT NULL,
    "laporanPerhari" text,
    "screenShotProgressKerja" text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
 $   DROP TABLE public."ProgresPeserta";
       public         heap    postgres    false    8            "           1259    19639    ProgresPeserta_id_seq    SEQUENCE     �   CREATE SEQUENCE public."ProgresPeserta_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 .   DROP SEQUENCE public."ProgresPeserta_id_seq";
       public          postgres    false    8    289                       0    0    ProgresPeserta_id_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public."ProgresPeserta_id_seq" OWNED BY public."ProgresPeserta".id;
          public          postgres    false    290            #           1259    19641    Resume    TABLE       CREATE TABLE public."Resume" (
    id text NOT NULL,
    "tenderPesertaId" text,
    "fileName" text NOT NULL,
    url text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
    DROP TABLE public."Resume";
       public         heap    postgres    false    8            $           1259    19648    Session    TABLE     �   CREATE TABLE public."Session" (
    id text NOT NULL,
    "sessionToken" text NOT NULL,
    "userId" text NOT NULL,
    expires timestamp(3) without time zone NOT NULL
);
    DROP TABLE public."Session";
       public         heap    postgres    false    8            %           1259    19654    Tender    TABLE     m  CREATE TABLE public."Tender" (
    id text NOT NULL,
    "userId" text NOT NULL,
    "judulTender" text NOT NULL,
    kategori text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "deskripsiPekerjaan" text NOT NULL,
    "msPostingTenderId" text NOT NULL,
    budget integer NOT NULL,
    "syaratKetentuan" integer DEFAULT 0,
    "statusProposal" integer DEFAULT 0 NOT NULL,
    "MetodePembayaran" public."MetodePembayaran" NOT NULL,
    "durasiWaktuPekerjaan" integer NOT NULL,
    "msStatusTenderId" integer,
    skills text[],
    "msMerchantLevelId" integer NOT NULL,
    "LingkupPekerjaan" public."LingkupPekerjaanTender",
    "TipePekerjaan" public."TipePekerjaanTender",
    "isTenderFavorit" integer DEFAULT 0,
    "jumlahTenderPeserta" integer DEFAULT 0 NOT NULL,
    slug text
);
    DROP TABLE public."Tender";
       public         heap    postgres    false    862    829    826    8            &           1259    19665    TenderAktifitas    TABLE     �   CREATE TABLE public."TenderAktifitas" (
    id text NOT NULL,
    status text,
    "userId" text NOT NULL,
    "tenderId" text,
    "tenderPesertaId" text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP
);
 %   DROP TABLE public."TenderAktifitas";
       public         heap    postgres    false    8            '           1259    19672    TenderKontrak    TABLE       CREATE TABLE public."TenderKontrak" (
    id text NOT NULL,
    "userId" text NOT NULL,
    "tenderPesertaId" text NOT NULL,
    file text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "isStatusKontrak" integer DEFAULT 1 NOT NULL
);
 #   DROP TABLE public."TenderKontrak";
       public         heap    postgres    false    8            (           1259    19680    TenderPeserta    TABLE     �  CREATE TABLE public."TenderPeserta" (
    id text NOT NULL,
    budget integer NOT NULL,
    "userId" text NOT NULL,
    "msAlasanPembatalanTenderId" text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "coverLatter" text NOT NULL,
    "tenderId" text NOT NULL,
    "statusProposal" integer DEFAULT 1 NOT NULL,
    "tglMulaiPekerjaan" timestamp(3) without time zone,
    "durasiWaktuPekerjaan" integer DEFAULT 1 NOT NULL,
    "statusDiterimaProposal" integer DEFAULT 0 NOT NULL,
    "statusKontrak" integer DEFAULT 1 NOT NULL,
    "statusKontrakPeserta" integer DEFAULT 1 NOT NULL
);
 #   DROP TABLE public."TenderPeserta";
       public         heap    postgres    false    8            )           1259    19692    User    TABLE     (  CREATE TABLE public."User" (
    id text NOT NULL,
    name text,
    email text,
    image text,
    phone text,
    password text,
    website text,
    occupation text,
    description text,
    "dateBirth" date,
    ktp text,
    "selfieKtp" text,
    npwp text,
    username text,
    level integer,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    pin text,
    "updatedAt" timestamp(3) without time zone,
    gender public."Gender",
    "msMerchantLevelId" integer,
    "msPekerjaanId" text,
    "verificationMsg" text,
    "isEmailVerified" integer DEFAULT 0,
    "isPhoneVerified" integer DEFAULT 0,
    "sellerStatus" integer DEFAULT 0,
    status integer DEFAULT 0,
    "msKotaId" integer,
    "msProvinsiId" integer,
    "phonePrefix" text,
    "vaNumber" integer
);
    DROP TABLE public."User";
       public         heap    postgres    false    8    802            *           1259    19703 
   UserAlamat    TABLE     �  CREATE TABLE public."UserAlamat" (
    id text NOT NULL,
    alamat text NOT NULL,
    long text,
    lat text,
    label text NOT NULL,
    "catatanKurir" text,
    "namaPenerima" text NOT NULL,
    "isMain" integer DEFAULT 0,
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    phone text NOT NULL,
    "msKotaId" integer,
    "msProvinsiId" integer,
    "phonePrefix" text
);
     DROP TABLE public."UserAlamat";
       public         heap    postgres    false    8            +           1259    19711 
   UserBahasa    TABLE       CREATE TABLE public."UserBahasa" (
    id text NOT NULL,
    "msBahasaId" bigint NOT NULL,
    "userId" text NOT NULL,
    level public."LevelType" NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
     DROP TABLE public."UserBahasa";
       public         heap    postgres    false    823    8            ,           1259    19718    UserEdukasi    TABLE     ;  CREATE TABLE public."UserEdukasi" (
    id text NOT NULL,
    "msNegaraId" bigint NOT NULL,
    "msTingkatEdukasiId" bigint NOT NULL,
    institusi text NOT NULL,
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 !   DROP TABLE public."UserEdukasi";
       public         heap    postgres    false    8            -           1259    19725    UserFollowing    TABLE     �   CREATE TABLE public."UserFollowing" (
    "userId" text NOT NULL,
    "followingUserId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    id integer NOT NULL
);
 #   DROP TABLE public."UserFollowing";
       public         heap    postgres    false    8            .           1259    19732    UserFollowing_id_seq    SEQUENCE     �   CREATE SEQUENCE public."UserFollowing_id_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public."UserFollowing_id_seq";
       public          postgres    false    301    8                       0    0    UserFollowing_id_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public."UserFollowing_id_seq" OWNED BY public."UserFollowing".id;
          public          postgres    false    302            /           1259    19734    UserForgetPassword    TABLE     �   CREATE TABLE public."UserForgetPassword" (
    id text NOT NULL,
    "userId" text,
    username text,
    status integer DEFAULT 0,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    email text,
    token text
);
 (   DROP TABLE public."UserForgetPassword";
       public         heap    postgres    false    8            0           1259    19742    UserKeahlian    TABLE       CREATE TABLE public."UserKeahlian" (
    id text NOT NULL,
    "userId" text NOT NULL,
    level public."LevelType" NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    nama text NOT NULL
);
 "   DROP TABLE public."UserKeahlian";
       public         heap    postgres    false    823    8            1           1259    19749    UserKepuasan    TABLE       CREATE TABLE public."UserKepuasan" (
    id text NOT NULL,
    "userId" text NOT NULL,
    "createdBy" text NOT NULL,
    kepuasan public."Kepuasan" NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 "   DROP TABLE public."UserKepuasan";
       public         heap    postgres    false    8    814            2           1259    19756    UserNotifikasi    TABLE     �   CREATE TABLE public."UserNotifikasi" (
    id text NOT NULL,
    "msNotifikasiId" integer NOT NULL,
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 $   DROP TABLE public."UserNotifikasi";
       public         heap    postgres    false    8            3           1259    19763    UserRekening    TABLE     6  CREATE TABLE public."UserRekening" (
    id text NOT NULL,
    "msBankId" integer NOT NULL,
    "userId" text NOT NULL,
    "isMain" integer DEFAULT 0,
    rekening text,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    nama text
);
 "   DROP TABLE public."UserRekening";
       public         heap    postgres    false    8            4           1259    19771    UserSertifikat    TABLE     #  CREATE TABLE public."UserSertifikat" (
    id text NOT NULL,
    nama text NOT NULL,
    tahun text NOT NULL,
    institusi text NOT NULL,
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone
);
 $   DROP TABLE public."UserSertifikat";
       public         heap    postgres    false    8            5           1259    19778    UserTenderFavorit    TABLE     �   CREATE TABLE public."UserTenderFavorit" (
    id text NOT NULL,
    "userId" text NOT NULL,
    "tenderId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "isTenderFavorit" integer DEFAULT 0
);
 '   DROP TABLE public."UserTenderFavorit";
       public         heap    postgres    false    8            6           1259    19786 
   UserVaOpen    TABLE     G  CREATE TABLE public."UserVaOpen" (
    id text NOT NULL,
    "userId" text NOT NULL,
    number text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "updatedAt" timestamp(3) without time zone,
    "expiredAt" timestamp(3) without time zone,
    bank text NOT NULL,
    original jsonb
);
     DROP TABLE public."UserVaOpen";
       public         heap    postgres    false    8            7           1259    19793    UserVerification    TABLE     p  CREATE TABLE public."UserVerification" (
    id text NOT NULL,
    "userId" text NOT NULL,
    kode text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP,
    "expiredAt" timestamp(3) without time zone NOT NULL,
    "verifiedAt" timestamp(3) without time zone,
    method public."VerificationMethod" NOT NULL,
    "changedTo" text
);
 &   DROP TABLE public."UserVerification";
       public         heap    postgres    false    865    8            8           1259    19800    UserWhistlist    TABLE     �   CREATE TABLE public."UserWhistlist" (
    id text NOT NULL,
    "jasaId" text NOT NULL,
    "userId" text NOT NULL,
    "createdAt" timestamp(3) without time zone DEFAULT CURRENT_TIMESTAMP
);
 #   DROP TABLE public."UserWhistlist";
       public         heap    postgres    false    8            9           1259    19807    User_vaNumber_seq    SEQUENCE     �   CREATE SEQUENCE public."User_vaNumber_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 *   DROP SEQUENCE public."User_vaNumber_seq";
       public          postgres    false    297    8                       0    0    User_vaNumber_seq    SEQUENCE OWNED BY     M   ALTER SEQUENCE public."User_vaNumber_seq" OWNED BY public."User"."vaNumber";
          public          postgres    false    313            :           1259    19809    VerificationToken    TABLE     �   CREATE TABLE public."VerificationToken" (
    identifier text NOT NULL,
    token text NOT NULL,
    expires timestamp(3) without time zone NOT NULL
);
 '   DROP TABLE public."VerificationToken";
       public         heap    postgres    false    8            �            1259    19113    failed_jobs    TABLE     &  CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         heap    postgres    false    8            �            1259    19111    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public          postgres    false    8    218                       0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
          public          postgres    false    217            �            1259    19084 
   migrations    TABLE     �   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         heap    postgres    false    8            �            1259    19082    migrations_id_seq    SEQUENCE     �   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public          postgres    false    8    213                       0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
          public          postgres    false    212            ?           1259    20590    model_has_permissions    TABLE     �   CREATE TABLE public.model_has_permissions (
    permission_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);
 )   DROP TABLE public.model_has_permissions;
       public         heap    postgres    false    8            @           1259    20601    model_has_roles    TABLE     �   CREATE TABLE public.model_has_roles (
    role_id bigint NOT NULL,
    model_type character varying(255) NOT NULL,
    model_id bigint NOT NULL
);
 #   DROP TABLE public.model_has_roles;
       public         heap    postgres    false    8            �            1259    19104    password_resets    TABLE     �   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         heap    postgres    false    8            <           1259    20566    permissions    TABLE     �   CREATE TABLE public.permissions (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.permissions;
       public         heap    postgres    false    8            ;           1259    20564    permissions_id_seq    SEQUENCE     {   CREATE SEQUENCE public.permissions_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.permissions_id_seq;
       public          postgres    false    316    8                       0    0    permissions_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.permissions_id_seq OWNED BY public.permissions.id;
          public          postgres    false    315            �            1259    19127    personal_access_tokens    TABLE     �  CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
 *   DROP TABLE public.personal_access_tokens;
       public         heap    postgres    false    8            �            1259    19125    personal_access_tokens_id_seq    SEQUENCE     �   CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 4   DROP SEQUENCE public.personal_access_tokens_id_seq;
       public          postgres    false    220    8                       0    0    personal_access_tokens_id_seq    SEQUENCE OWNED BY     _   ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;
          public          postgres    false    219            A           1259    20612    role_has_permissions    TABLE     m   CREATE TABLE public.role_has_permissions (
    permission_id bigint NOT NULL,
    role_id bigint NOT NULL
);
 (   DROP TABLE public.role_has_permissions;
       public         heap    postgres    false    8            >           1259    20579    roles    TABLE     �   CREATE TABLE public.roles (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    guard_name character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.roles;
       public         heap    postgres    false    8            =           1259    20577    roles_id_seq    SEQUENCE     u   CREATE SEQUENCE public.roles_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.roles_id_seq;
       public          postgres    false    8    318                       0    0    roles_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.roles_id_seq OWNED BY public.roles.id;
          public          postgres    false    317            �            1259    19092    users    TABLE        CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    role character varying(255),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone,
    CONSTRAINT users_role_check CHECK (((role)::text = ANY ((ARRAY['admin'::character varying, 'user'::character varying])::text[])))
);
    DROP TABLE public.users;
       public         heap    postgres    false    8            �            1259    19090    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public          postgres    false    8    215                       0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
          public          postgres    false    214            i           2604    32922    failed_jobs id    DEFAULT     n   ALTER TABLE ONLY panel.failed_jobs ALTER COLUMN id SET DEFAULT nextval('panel.failed_jobs_id_seq'::regclass);
 <   ALTER TABLE panel.failed_jobs ALTER COLUMN id DROP DEFAULT;
       panel          postgres    false    332    331    332            e           2604    32871    migrations id    DEFAULT     l   ALTER TABLE ONLY panel.migrations ALTER COLUMN id SET DEFAULT nextval('panel.migrations_id_seq'::regclass);
 ;   ALTER TABLE panel.migrations ALTER COLUMN id DROP DEFAULT;
       panel          postgres    false    323    322    323            l           2604    32950    permissions id    DEFAULT     n   ALTER TABLE ONLY panel.permissions ALTER COLUMN id SET DEFAULT nextval('panel.permissions_id_seq'::regclass);
 <   ALTER TABLE panel.permissions ALTER COLUMN id DROP DEFAULT;
       panel          postgres    false    335    336    336            k           2604    32936    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY panel.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('panel.personal_access_tokens_id_seq'::regclass);
 G   ALTER TABLE panel.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       panel          postgres    false    334    333    334            q           2604    32967    roles id    DEFAULT     b   ALTER TABLE ONLY panel.roles ALTER COLUMN id SET DEFAULT nextval('panel.roles_id_seq'::regclass);
 6   ALTER TABLE panel.roles ALTER COLUMN id DROP DEFAULT;
       panel          postgres    false    337    338    338            f           2604    32883    telescope_entries sequence    DEFAULT     �   ALTER TABLE ONLY panel.telescope_entries ALTER COLUMN sequence SET DEFAULT nextval('panel.telescope_entries_sequence_seq'::regclass);
 H   ALTER TABLE panel.telescope_entries ALTER COLUMN sequence DROP DEFAULT;
       panel          postgres    false    325    326    326            h           2604    32914    verifybackup id    DEFAULT     p   ALTER TABLE ONLY panel.verifybackup ALTER COLUMN id SET DEFAULT nextval('panel.verifybackup_id_seq'::regclass);
 =   ALTER TABLE panel.verifybackup ALTER COLUMN id DROP DEFAULT;
       panel          postgres    false    329    330    330            9           2604    20770    ProgresPeserta id    DEFAULT     z   ALTER TABLE ONLY public."ProgresPeserta" ALTER COLUMN id SET DEFAULT nextval('public."ProgresPeserta_id_seq"'::regclass);
 B   ALTER TABLE public."ProgresPeserta" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    290    289            O           2604    20771    User vaNumber    DEFAULT     t   ALTER TABLE ONLY public."User" ALTER COLUMN "vaNumber" SET DEFAULT nextval('public."User_vaNumber_seq"'::regclass);
 @   ALTER TABLE public."User" ALTER COLUMN "vaNumber" DROP DEFAULT;
       public          postgres    false    313    297            U           2604    20772    UserFollowing id    DEFAULT     x   ALTER TABLE ONLY public."UserFollowing" ALTER COLUMN id SET DEFAULT nextval('public."UserFollowing_id_seq"'::regclass);
 A   ALTER TABLE public."UserFollowing" ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    302    301            �           2604    20773    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    218    217    218            �           2604    20774    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    212    213    213            c           2604    20569    permissions id    DEFAULT     p   ALTER TABLE ONLY public.permissions ALTER COLUMN id SET DEFAULT nextval('public.permissions_id_seq'::regclass);
 =   ALTER TABLE public.permissions ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    316    315    316            �           2604    20775    personal_access_tokens id    DEFAULT     �   ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);
 H   ALTER TABLE public.personal_access_tokens ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    220    219    220            d           2604    20582    roles id    DEFAULT     d   ALTER TABLE ONLY public.roles ALTER COLUMN id SET DEFAULT nextval('public.roles_id_seq'::regclass);
 7   ALTER TABLE public.roles ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    317    318    318            �           2604    20776    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    215    214    215            �          0    33009    cl_coa 
   TABLE DATA           h   COPY panel.cl_coa (id, kdrek1, kdrek2, kdrek3, kdrek, uraian, type, created_at, updated_at) FROM stdin;
    panel          postgres    false    342   �^      �          0    32919    failed_jobs 
   TABLE DATA           `   COPY panel.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    panel          postgres    false    332   _      �          0    32868 
   migrations 
   TABLE DATA           9   COPY panel.migrations (id, migration, batch) FROM stdin;
    panel          postgres    false    323   /_      �          0    32972    model_has_permissions 
   TABLE DATA           S   COPY panel.model_has_permissions (permission_id, model_type, model_id) FROM stdin;
    panel          postgres    false    339   `      �          0    32983    model_has_roles 
   TABLE DATA           G   COPY panel.model_has_roles (role_id, model_type, model_id) FROM stdin;
    panel          postgres    false    340   %`      �          0    32874    password_resets 
   TABLE DATA           B   COPY panel.password_resets (email, token, created_at) FROM stdin;
    panel          postgres    false    324   l`      �          0    32947    permissions 
   TABLE DATA           �   COPY panel.permissions (id, name, guard_name, module_icon, module_url, module_parent, module_position, module_description, module_status, is_deleted, created_at, updated_at) FROM stdin;
    panel          postgres    false    336   �`      �          0    32933    personal_access_tokens 
   TABLE DATA           �   COPY panel.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    panel          postgres    false    334   0a      �          0    32994    role_has_permissions 
   TABLE DATA           E   COPY panel.role_has_permissions (permission_id, role_id) FROM stdin;
    panel          postgres    false    341   Ma      �          0    32964    roles 
   TABLE DATA           L   COPY panel.roles (id, name, guard_name, created_at, updated_at) FROM stdin;
    panel          postgres    false    338   �a      �          0    33017    tbl_user 
   TABLE DATA           �   COPY panel.tbl_user (id, username, password, cl_user_group_id, nama_lengkap, status, cl_perusahaan_id, update_date, update_by, created_at, updated_at) FROM stdin;
    panel          postgres    false    343   �a      �          0    32880    telescope_entries 
   TABLE DATA           �   COPY panel.telescope_entries (sequence, uuid, batch_id, family_hash, should_display_on_index, type, content, created_at) FROM stdin;
    panel          postgres    false    326   ic      �          0    32896    telescope_entries_tags 
   TABLE DATA           @   COPY panel.telescope_entries_tags (entry_uuid, tag) FROM stdin;
    panel          postgres    false    327   ��      �          0    32906    telescope_monitoring 
   TABLE DATA           2   COPY panel.telescope_monitoring (tag) FROM stdin;
    panel          postgres    false    328   �       �          0    32911    verifybackup 
   TABLE DATA           8   COPY panel.verifybackup (id, verify_status) FROM stdin;
    panel          postgres    false    330   �       �          0    19139    AccessToken 
   TABLE DATA           �   COPY public."AccessToken" (id, expireln, "expireAt", token, bank, original, signature, "timestamp", "refreshToken", created_at, updated_at) FROM stdin;
    public          postgres    false    221   �       �          0    19147    Account 
   TABLE DATA           �   COPY public."Account" (id, "userId", type, provider, "providerAccountId", refresh_token, access_token, expires_at, token_type, scope, id_token, session_state, created_at, updated_at) FROM stdin;
    public          postgres    false    222         �          0    19155    BatalTenderProposal 
   TABLE DATA           �   COPY public."BatalTenderProposal" (id, alasan, "msAlasanPembatalanTenderId", "tenderPesertaId", created_at, updated_at) FROM stdin;
    public          postgres    false    223   �      �          0    19163    Jasa 
   TABLE DATA           �   COPY public."Jasa" (id, nama, "msSubkategoriId", "msKategoriId", tags, impresi, klik, "userId", deskripsi, cover, slug, "hargaTermahal", "hargaTermurah", "msStatusJasaId", "isPengambilan", "isPengiriman", "isUnggulan", created_at, updated_at) FROM stdin;
    public          postgres    false    224   �      �          0    19177    JasaDiskusi 
   TABLE DATA           \   COPY public."JasaDiskusi" (id, isi, "jasaId", "userId", created_at, updated_at) FROM stdin;
    public          postgres    false    225   �      �          0    19185    JasaDiskusiBalasan 
   TABLE DATA           t   COPY public."JasaDiskusiBalasan" (id, isi, "jasaDiskusiId", "jasaId", "userId", created_at, updated_at) FROM stdin;
    public          postgres    false    226         �          0    19193    JasaDoc 
   TABLE DATA           `   COPY public."JasaDoc" (id, url, tipe, "fileName", "jasaId", created_at, updated_at) FROM stdin;
    public          postgres    false    227   )      �          0    19201    JasaFaq 
   TABLE DATA           ^   COPY public."JasaFaq" (id, pertanyaan, jawaban, "jasaId", created_at, updated_at) FROM stdin;
    public          postgres    false    228   F      �          0    19210    JasaPricing 
   TABLE DATA           �   COPY public."JasaPricing" (id, "jasaId", nama, deskripsi, "jumlahPeriode", periode, harga, "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    229   c      �          0    19217    JasaRequirement 
   TABLE DATA           n   COPY public."JasaRequirement" (id, pertanyaan, jawaban, "jasaId", "createdAt", "updatedAt", tipe) FROM stdin;
    public          postgres    false    230   �      �          0    19224 
   JasaReview 
   TABLE DATA           �   COPY public."JasaReview" (id, rating, review, "orderId", foto, "jasaId", "userId", kepuasan, "createdAt", "updatedAt", "orderJasaId") FROM stdin;
    public          postgres    false    231          �          0    19231    JasaReviewDetail 
   TABLE DATA           [   COPY public."JasaReviewDetail" (id, "msReviewPointId", "jasaReviewId", rating) FROM stdin;
    public          postgres    false    232   	!      �          0    19270    MsAktifitas 
   TABLE DATA           �   COPY public."MsAktifitas" (id, nama, "namaDiPenjual", "namaDiPembeli", "group", "jawabanDariAktifitas", "order", keterangan, "createdAt", "updatedAt", role, "nextAktifitas") FROM stdin;
    public          postgres    false    238   /#      �          0    19277    MsAlasanPembatalanTender 
   TABLE DATA           X   COPY public."MsAlasanPembatalanTender" (id, nama, "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    239   3%      �          0    19284    MsBahasa 
   TABLE DATA           9   COPY public."MsBahasa" (id, nama, "isAktif") FROM stdin;
    public          postgres    false    240   �%      �          0    19291    MsBank 
   TABLE DATA           C   COPY public."MsBank" (id, nama, kode, "isAktif", icon) FROM stdin;
    public          postgres    false    241   �&      �          0    19298    MsFee 
   TABLE DATA           N   COPY public."MsFee" (id, nama, nilai, persen, "isAktif", "group") FROM stdin;
    public          postgres    false    242   '      �          0    19306 
   MsKategori 
   TABLE DATA           F   COPY public."MsKategori" (id, nama, "isAktif", url, icon) FROM stdin;
    public          postgres    false    243   Q'      �          0    19313    MsKota 
   TABLE DATA           M   COPY public."MsKota" (id, nama, "msProvinsiId", tipe, "kodePos") FROM stdin;
    public          postgres    false    244   �(      �          0    19319    MsKurir 
   TABLE DATA           J   COPY public."MsKurir" (id, "isAktif", nama, icon, info, kode) FROM stdin;
    public          postgres    false    245   �?      �          0    19326    MsKurirLayanan 
   TABLE DATA           L   COPY public."MsKurirLayanan" (id, "msKurirId", "isAktif", nama) FROM stdin;
    public          postgres    false    246   �@      �          0    19333    MsMerchantLevel 
   TABLE DATA           |   COPY public."MsMerchantLevel" (id, nama, "minScore", "createdAt", deskripsi, tos, "updatedAt", "isAktif", icon) FROM stdin;
    public          postgres    false    247   ;A      �          0    19341    MsMerchantLevelBenefit 
   TABLE DATA           v   COPY public."MsMerchantLevelBenefit" (id, "msMerchantLevelId", nama, "createdAt", "updatedAt", "isAktif") FROM stdin;
    public          postgres    false    248   �A      �          0    19349    MsNegara 
   TABLE DATA           <   COPY public."MsNegara" (id, nama, status, kode) FROM stdin;
    public          postgres    false    249   B      �          0    19356    MsNotifikasi 
   TABLE DATA           b   COPY public."MsNotifikasi" (id, nama, "msGroupNotifikasi", "msKeahlianId", "isAktif") FROM stdin;
    public          postgres    false    250   ZB      �          0    19363    MsNotifikasiGroup 
   TABLE DATA           7   COPY public."MsNotifikasiGroup" (id, nama) FROM stdin;
    public          postgres    false    251   C      �          0    19369    MsPaymentMethod 
   TABLE DATA           T   COPY public."MsPaymentMethod" (id, nama, method, bank, "isAktif", icon) FROM stdin;
    public          postgres    false    252   HC      �          0    19376    MsPekerjaan 
   TABLE DATA           9   COPY public."MsPekerjaan" (id, status, nama) FROM stdin;
    public          postgres    false    253   �C      �          0    19383    MsPostingTender 
   TABLE DATA           B   COPY public."MsPostingTender" (id, nama, "createdAt") FROM stdin;
    public          postgres    false    254    D      �          0    19390 
   MsProvinsi 
   TABLE DATA           0   COPY public."MsProvinsi" (id, nama) FROM stdin;
    public          postgres    false    255   �D      �          0    19396    MsReviewPoint 
   TABLE DATA           >   COPY public."MsReviewPoint" (id, nama, "isAktif") FROM stdin;
    public          postgres    false    256   �E      �          0    19403    MsStatusAkun 
   TABLE DATA           =   COPY public."MsStatusAkun" (id, nama, "isAktif") FROM stdin;
    public          postgres    false    257   ;F      �          0    19410    MsStatusJasa 
   TABLE DATA           =   COPY public."MsStatusJasa" (id, nama, "isAktif") FROM stdin;
    public          postgres    false    258   �F      �          0    19417    MsStatusSeller 
   TABLE DATA           ?   COPY public."MsStatusSeller" (id, nama, "isAktif") FROM stdin;
    public          postgres    false    259   �F      �          0    19424    MsStatusTender 
   TABLE DATA           ?   COPY public."MsStatusTender" (id, nama, "isAktif") FROM stdin;
    public          postgres    false    260   PG      �          0    19431    MsSubkategori 
   TABLE DATA           e   COPY public."MsSubkategori" (id, nama, "isAktif", "msKategoriId", url, icon, background) FROM stdin;
    public          postgres    false    261   mG      �          0    19438    MsTingkatEdukasi 
   TABLE DATA           >   COPY public."MsTingkatEdukasi" (id, nama, status) FROM stdin;
    public          postgres    false    262   N      �          0    19445    Notification 
   TABLE DATA           �   COPY public."Notification" (id, "senderUserId", "targetUserId", title, isi, url, tipe, "createdAt", "updatedAt", "isRead", role) FROM stdin;
    public          postgres    false    263   cN      �          0    19453    Obrolan 
   TABLE DATA           V   COPY public."Obrolan" (id, "userIds", "createdAt", "updatedAt", "userId") FROM stdin;
    public          postgres    false    264   �c      �          0    19460    ObrolanContent 
   TABLE DATA           m   COPY public."ObrolanContent" (id, "obrolanId", "createdAt", isi, status, "userId", tipe, detail) FROM stdin;
    public          postgres    false    265   �j      �          0    19245    Order 
   TABLE DATA           �  COPY public."Order" (id, nomor, penawaran, "msAktifitasId", "masaBerlaku", "isNeedRequirement", "userIdPenjual", "userIdPembeli", "createdAt", "updatedAt", "totalPenawaran", "totalFee", "totalBayar", "persentaseKomisiOnan", "totalKomisiOnan", "totalKomisiPenjual", "currentTerminId", "jumlahTermin", "saldoDigunakan", "isNeedPengiriman", "totalOngkir", "totalOrder", "orderHasilId", "confirmBefore", "msPaymentMethodId") FROM stdin;
    public          postgres    false    235   G�      �          0    19474    OrderAktifitas 
   TABLE DATA           �   COPY public."OrderAktifitas" (id, "orderId", "msAktifitasId", "createdAt", urutan, "userId", attachments, "orderTerminId", komentar) FROM stdin;
    public          postgres    false    267   3�      �          0    19481    OrderFee 
   TABLE DATA           Z   COPY public."OrderFee" (id, nama, nilai, "orderId", "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    268   ��      �          0    19488 
   OrderHasil 
   TABLE DATA           ~   COPY public."OrderHasil" (id, url, "orderId", keterangan, status, komentar, "createdAt", "updatedAt", "terminId") FROM stdin;
    public          postgres    false    269   ��      �          0    19496    OrderHasilAttachment 
   TABLE DATA           m   COPY public."OrderHasilAttachment" (id, filename, url, "orderHasilId", "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    270   ��      �          0    19257 	   OrderJasa 
   TABLE DATA           �   COPY public."OrderJasa" (id, nama, deskripsi, "orderId", foto, "namaPricing", "jasaId", "isReviewed", "createdAt", "updatedAt", nilai) FROM stdin;
    public          postgres    false    236   +�      �          0    19503    OrderJasaKepuasan 
   TABLE DATA           w   COPY public."OrderJasaKepuasan" (id, "orderJasaId", kepuasan, "createdAt", "updatedAt", sebagai, "userId") FROM stdin;
    public          postgres    false    271   �      �          0    19510    OrderPayment 
   TABLE DATA           �   COPY public."OrderPayment" (id, "orderId", status, amount, url, "expiredAt", "createdAt", "paidAt", method, channel, destination, "updatedAt", "payerEmail", original, "orderTerminId", "billNumber") FROM stdin;
    public          postgres    false    272   *�      �          0    19517    OrderPaymentHistory 
   TABLE DATA           ]   COPY public."OrderPaymentHistory" (id, status, "createdAt", "orderId", original) FROM stdin;
    public          postgres    false    273   ��      �          0    19523    OrderPengiriman 
   TABLE DATA           ?  COPY public."OrderPengiriman" (id, "orderId", status, "pengirimPhone", "pengirimKota", "pengirimProvinsi", "pengirimKodePos", "pengirimNama", "penerimaPhone", "penerimaKota", "penerimaProvinsi", "penerimaKodePos", "penerimaNama", kurir, servis, "createdAt", "updatedAt", "penerimaAlamat", "pengirimAlamat") FROM stdin;
    public          postgres    false    274   N      �          0    19531    OrderTermin 
   TABLE DATA           �   COPY public."OrderTermin" (id, "terminKe", "orderId", pencapaian, nilai, "jumlahRevisi", "jumlahPeriode", periode, "createdAt", "updatedAt", "isSelesai", "startDate", "finishedDate", "nilaiOnan", "nilaiPenjual") FROM stdin;
    public          postgres    false    275   �      �          0    19541 	   Pencairan 
   TABLE DATA           �   COPY public."Pencairan" (id, nilai, "createdAt", "updatedAt", keterangan, "userId", "namaRekening", rekening, "msBankId", status, "terminId") FROM stdin;
    public          postgres    false    276   Y      �          0    19563    Penghasilan 
   TABLE DATA           J   COPY public."Penghasilan" (id, "mataUang", pendapatan, waktu) FROM stdin;
    public          postgres    false    279   t      �          0    19569    PenjualPengaturanCatatan 
   TABLE DATA           N   COPY public."PenjualPengaturanCatatan" (id, judul, isi, "userId") FROM stdin;
    public          postgres    false    280   �      �          0    19575    PenjualPengaturanJadwalLibur 
   TABLE DATA           �   COPY public."PenjualPengaturanJadwalLibur" (id, "tglMulaiLibur", "tglSelesaiLibur", "userId", "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    281   �      �          0    19582 "   PenjualPengaturanJadwalOperasional 
   TABLE DATA           |   COPY public."PenjualPengaturanJadwalOperasional" (id, tipe, "jamBuka", "jamTutup", hari, "userId", "createdAt") FROM stdin;
    public          postgres    false    282         �          0    19589    PenjualPengaturanPengiriman 
   TABLE DATA           �   COPY public."PenjualPengaturanPengiriman" (id, "userId", "msKotaId", "msProvinsiId", alamat, "catatanKurir", "createdAt", label, lat, long, phone, "updatedAt", "userAlamatId") FROM stdin;
    public          postgres    false    283   $      �          0    19596 !   PenjualPengaturanPengirimanDetail 
   TABLE DATA           |   COPY public."PenjualPengaturanPengirimanDetail" (id, "createdAt", "msKurirId", "penjualPengaturanPengirimanId") FROM stdin;
    public          postgres    false    284   �       �          0    19603    PenjualPengaturanProdukUnggulan 
   TABLE DATA           `   COPY public."PenjualPengaturanProdukUnggulan" (id, "userId", "jasaId", "createdAt") FROM stdin;
    public          postgres    false    285   �!      �          0    19610     PenjualPengaturanTemplateBalasan 
   TABLE DATA           {   COPY public."PenjualPengaturanTemplateBalasan" (id, isi, "userId", "isAktif", judul, "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    286   M#      �          0    19618    PenjualScore 
   TABLE DATA           Z   COPY public."PenjualScore" (id, "userId", "createdAt", point, ref, aktifitas) FROM stdin;
    public          postgres    false    287   L$      �          0    19625 
   Portofolio 
   TABLE DATA           h   COPY public."Portofolio" (id, "tenderPesertaId", "fileName", url, "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    288   p'      �          0    19632    ProgresPeserta 
   TABLE DATA           �   COPY public."ProgresPeserta" (id, "userId", "tenderPesertaId", "laporanPerhari", "screenShotProgressKerja", "createdAt") FROM stdin;
    public          postgres    false    289   �'      �          0    19641    Resume 
   TABLE DATA           d   COPY public."Resume" (id, "tenderPesertaId", "fileName", url, "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    291   �'      �          0    19549    Saldo 
   TABLE DATA           \   COPY public."Saldo" (id, debit, kredit, "createdAt", keterangan, "userId", ref) FROM stdin;
    public          postgres    false    277   �'      �          0    19648    Session 
   TABLE DATA           J   COPY public."Session" (id, "sessionToken", "userId", expires) FROM stdin;
    public          postgres    false    292   n.      �          0    19654    Tender 
   TABLE DATA           m  COPY public."Tender" (id, "userId", "judulTender", kategori, "createdAt", "updatedAt", "deskripsiPekerjaan", "msPostingTenderId", budget, "syaratKetentuan", "statusProposal", "MetodePembayaran", "durasiWaktuPekerjaan", "msStatusTenderId", skills, "msMerchantLevelId", "LingkupPekerjaan", "TipePekerjaan", "isTenderFavorit", "jumlahTenderPeserta", slug) FROM stdin;
    public          postgres    false    293   �.      �          0    19665    TenderAktifitas 
   TABLE DATA           m   COPY public."TenderAktifitas" (id, status, "userId", "tenderId", "tenderPesertaId", "createdAt") FROM stdin;
    public          postgres    false    294   �.      �          0    19672    TenderKontrak 
   TABLE DATA           p   COPY public."TenderKontrak" (id, "userId", "tenderPesertaId", file, "createdAt", "isStatusKontrak") FROM stdin;
    public          postgres    false    295   �.      �          0    19680    TenderPeserta 
   TABLE DATA             COPY public."TenderPeserta" (id, budget, "userId", "msAlasanPembatalanTenderId", "createdAt", "updatedAt", "coverLatter", "tenderId", "statusProposal", "tglMulaiPekerjaan", "durasiWaktuPekerjaan", "statusDiterimaProposal", "statusKontrak", "statusKontrakPeserta") FROM stdin;
    public          postgres    false    296   �.      �          0    19692    User 
   TABLE DATA           v  COPY public."User" (id, name, email, image, phone, password, website, occupation, description, "dateBirth", ktp, "selfieKtp", npwp, username, level, "createdAt", pin, "updatedAt", gender, "msMerchantLevelId", "msPekerjaanId", "verificationMsg", "isEmailVerified", "isPhoneVerified", "sellerStatus", status, "msKotaId", "msProvinsiId", "phonePrefix", "vaNumber") FROM stdin;
    public          postgres    false    297   �.      �          0    19703 
   UserAlamat 
   TABLE DATA           �   COPY public."UserAlamat" (id, alamat, long, lat, label, "catatanKurir", "namaPenerima", "isMain", "userId", "createdAt", "updatedAt", phone, "msKotaId", "msProvinsiId", "phonePrefix") FROM stdin;
    public          postgres    false    298   DB      �          0    19711 
   UserBahasa 
   TABLE DATA           c   COPY public."UserBahasa" (id, "msBahasaId", "userId", level, "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    299   �F      �          0    19718    UserEdukasi 
   TABLE DATA           ~   COPY public."UserEdukasi" (id, "msNegaraId", "msTingkatEdukasiId", institusi, "userId", "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    300   �I      �          0    19725    UserFollowing 
   TABLE DATA           W   COPY public."UserFollowing" ("userId", "followingUserId", "createdAt", id) FROM stdin;
    public          postgres    false    301   uM      �          0    19734    UserForgetPassword 
   TABLE DATA           i   COPY public."UserForgetPassword" (id, "userId", username, status, "createdAt", email, token) FROM stdin;
    public          postgres    false    303   �M      �          0    19742    UserKeahlian 
   TABLE DATA           ]   COPY public."UserKeahlian" (id, "userId", level, "createdAt", "updatedAt", nama) FROM stdin;
    public          postgres    false    304   �R      �          0    19749    UserKepuasan 
   TABLE DATA           g   COPY public."UserKepuasan" (id, "userId", "createdBy", kepuasan, "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    305   W      �          0    19756    UserNotifikasi 
   TABLE DATA           d   COPY public."UserNotifikasi" (id, "msNotifikasiId", "userId", "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    306   PX      �          0    19763    UserRekening 
   TABLE DATA           v   COPY public."UserRekening" (id, "msBankId", "userId", "isMain", rekening, "createdAt", "updatedAt", nama) FROM stdin;
    public          postgres    false    307   Z      �          0    19771    UserSertifikat 
   TABLE DATA           j   COPY public."UserSertifikat" (id, nama, tahun, institusi, "userId", "createdAt", "updatedAt") FROM stdin;
    public          postgres    false    308   8\      �          0    19778    UserTenderFavorit 
   TABLE DATA           g   COPY public."UserTenderFavorit" (id, "userId", "tenderId", "createdAt", "isTenderFavorit") FROM stdin;
    public          postgres    false    309   �_      �          0    19786 
   UserVaOpen 
   TABLE DATA           s   COPY public."UserVaOpen" (id, "userId", number, "createdAt", "updatedAt", "expiredAt", bank, original) FROM stdin;
    public          postgres    false    310   `      �          0    19793    UserVerification 
   TABLE DATA           }   COPY public."UserVerification" (id, "userId", kode, "createdAt", "expiredAt", "verifiedAt", method, "changedTo") FROM stdin;
    public          postgres    false    311   ]b      �          0    19800    UserWhistlist 
   TABLE DATA           N   COPY public."UserWhistlist" (id, "jasaId", "userId", "createdAt") FROM stdin;
    public          postgres    false    312   �j      �          0    19809    VerificationToken 
   TABLE DATA           I   COPY public."VerificationToken" (identifier, token, expires) FROM stdin;
    public          postgres    false    314   �k      �          0    19113    failed_jobs 
   TABLE DATA           a   COPY public.failed_jobs (id, uuid, connection, queue, payload, exception, failed_at) FROM stdin;
    public          postgres    false    218   �k      }          0    19084 
   migrations 
   TABLE DATA           :   COPY public.migrations (id, migration, batch) FROM stdin;
    public          postgres    false    213   �k      �          0    20590    model_has_permissions 
   TABLE DATA           T   COPY public.model_has_permissions (permission_id, model_type, model_id) FROM stdin;
    public          postgres    false    319   �l      �          0    20601    model_has_roles 
   TABLE DATA           H   COPY public.model_has_roles (role_id, model_type, model_id) FROM stdin;
    public          postgres    false    320   m      �          0    19104    password_resets 
   TABLE DATA           C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public          postgres    false    216   %m      �          0    20566    permissions 
   TABLE DATA           S   COPY public.permissions (id, name, guard_name, created_at, updated_at) FROM stdin;
    public          postgres    false    316   Bm      �          0    19127    personal_access_tokens 
   TABLE DATA           �   COPY public.personal_access_tokens (id, tokenable_type, tokenable_id, name, token, abilities, last_used_at, expires_at, created_at, updated_at) FROM stdin;
    public          postgres    false    220   _m      �          0    20612    role_has_permissions 
   TABLE DATA           F   COPY public.role_has_permissions (permission_id, role_id) FROM stdin;
    public          postgres    false    321   |m      �          0    20579    roles 
   TABLE DATA           M   COPY public.roles (id, name, guard_name, created_at, updated_at) FROM stdin;
    public          postgres    false    318   �m                0    19092    users 
   TABLE DATA           {   COPY public.users (id, name, email, email_verified_at, password, remember_token, role, created_at, updated_at) FROM stdin;
    public          postgres    false    215   �m                 0    0    all_master_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('panel.all_master_id_seq', 118, true);
          panel          postgres    false    203                       0    0    cl_group_user_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('panel.cl_group_user_id_seq', 1, true);
          panel          postgres    false    204                       0    0    failed_jobs_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('panel.failed_jobs_id_seq', 1, false);
          panel          postgres    false    331                       0    0    migrations_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('panel.migrations_id_seq', 8, true);
          panel          postgres    false    322                       0    0    permissions_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('panel.permissions_id_seq', 5, true);
          panel          postgres    false    335                       0    0    personal_access_tokens_id_seq    SEQUENCE SET     K   SELECT pg_catalog.setval('panel.personal_access_tokens_id_seq', 1, false);
          panel          postgres    false    333                       0    0    roles_id_seq    SEQUENCE SET     9   SELECT pg_catalog.setval('panel.roles_id_seq', 4, true);
          panel          postgres    false    337                       0    0    tbl_belanja_header_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('panel.tbl_belanja_header_seq', 1452, true);
          panel          postgres    false    205                       0    0    tbl_jurnal_header_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('panel.tbl_jurnal_header_seq', 2498, true);
          panel          postgres    false    206                       0    0    tbl_kas_detail_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('panel.tbl_kas_detail_seq', 282, true);
          panel          postgres    false    207                       0    0    tbl_kas_header_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('panel.tbl_kas_header_seq', 234, true);
          panel          postgres    false    208                       0    0    tbl_user_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('panel.tbl_user_id_seq', 1, true);
          panel          postgres    false    209                        0    0    tbl_user_menu_id_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('panel.tbl_user_menu_id_seq', 22, true);
          panel          postgres    false    210            !           0    0    telescope_entries_sequence_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('panel.telescope_entries_sequence_seq', 1584, true);
          panel          postgres    false    325            "           0    0    verifybackup_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('panel.verifybackup_id_seq', 1, false);
          panel          postgres    false    329            #           0    0    OrdSeq    SEQUENCE SET     8   SELECT pg_catalog.setval('public."OrdSeq"', 182, true);
          public          postgres    false    211            $           0    0    ProgresPeserta_id_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."ProgresPeserta_id_seq"', 1, false);
          public          postgres    false    290            %           0    0    UserFollowing_id_seq    SEQUENCE SET     E   SELECT pg_catalog.setval('public."UserFollowing_id_seq"', 46, true);
          public          postgres    false    302            &           0    0    User_vaNumber_seq    SEQUENCE SET     B   SELECT pg_catalog.setval('public."User_vaNumber_seq"', 59, true);
          public          postgres    false    313            '           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
          public          postgres    false    217            (           0    0    migrations_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.migrations_id_seq', 12, true);
          public          postgres    false    212            )           0    0    permissions_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.permissions_id_seq', 1, false);
          public          postgres    false    315            *           0    0    personal_access_tokens_id_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);
          public          postgres    false    219            +           0    0    roles_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.roles_id_seq', 1, false);
          public          postgres    false    317            ,           0    0    users_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.users_id_seq', 14, true);
          public          postgres    false    214            w           2606    33016    cl_coa cl_coa_pkey 
   CONSTRAINT     O   ALTER TABLE ONLY panel.cl_coa
    ADD CONSTRAINT cl_coa_pkey PRIMARY KEY (id);
 ;   ALTER TABLE ONLY panel.cl_coa DROP CONSTRAINT cl_coa_pkey;
       panel            postgres    false    342            ^           2606    32928    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY panel.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 E   ALTER TABLE ONLY panel.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       panel            postgres    false    332            `           2606    32930 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ]   ALTER TABLE ONLY panel.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 L   ALTER TABLE ONLY panel.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       panel            postgres    false    332            O           2606    32873    migrations migrations_pkey 
   CONSTRAINT     W   ALTER TABLE ONLY panel.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 C   ALTER TABLE ONLY panel.migrations DROP CONSTRAINT migrations_pkey;
       panel            postgres    false    323            p           2606    32982 0   model_has_permissions model_has_permissions_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY panel.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);
 Y   ALTER TABLE ONLY panel.model_has_permissions DROP CONSTRAINT model_has_permissions_pkey;
       panel            postgres    false    339    339    339            s           2606    32993 $   model_has_roles model_has_roles_pkey 
   CONSTRAINT     |   ALTER TABLE ONLY panel.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);
 M   ALTER TABLE ONLY panel.model_has_roles DROP CONSTRAINT model_has_roles_pkey;
       panel            postgres    false    340    340    340            g           2606    32961 .   permissions permissions_name_guard_name_unique 
   CONSTRAINT     t   ALTER TABLE ONLY panel.permissions
    ADD CONSTRAINT permissions_name_guard_name_unique UNIQUE (name, guard_name);
 W   ALTER TABLE ONLY panel.permissions DROP CONSTRAINT permissions_name_guard_name_unique;
       panel            postgres    false    336    336            i           2606    32959    permissions permissions_pkey 
   CONSTRAINT     Y   ALTER TABLE ONLY panel.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);
 E   ALTER TABLE ONLY panel.permissions DROP CONSTRAINT permissions_pkey;
       panel            postgres    false    336            b           2606    32941 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     o   ALTER TABLE ONLY panel.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 [   ALTER TABLE ONLY panel.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       panel            postgres    false    334            d           2606    32944 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     u   ALTER TABLE ONLY panel.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 c   ALTER TABLE ONLY panel.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       panel            postgres    false    334            u           2606    33008 .   role_has_permissions role_has_permissions_pkey 
   CONSTRAINT        ALTER TABLE ONLY panel.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);
 W   ALTER TABLE ONLY panel.role_has_permissions DROP CONSTRAINT role_has_permissions_pkey;
       panel            postgres    false    341    341            k           2606    32971 "   roles roles_name_guard_name_unique 
   CONSTRAINT     h   ALTER TABLE ONLY panel.roles
    ADD CONSTRAINT roles_name_guard_name_unique UNIQUE (name, guard_name);
 K   ALTER TABLE ONLY panel.roles DROP CONSTRAINT roles_name_guard_name_unique;
       panel            postgres    false    338    338            m           2606    32969    roles roles_pkey 
   CONSTRAINT     M   ALTER TABLE ONLY panel.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 9   ALTER TABLE ONLY panel.roles DROP CONSTRAINT roles_pkey;
       panel            postgres    false    338            y           2606    33024    tbl_user tbl_user_pkey 
   CONSTRAINT     S   ALTER TABLE ONLY panel.tbl_user
    ADD CONSTRAINT tbl_user_pkey PRIMARY KEY (id);
 ?   ALTER TABLE ONLY panel.tbl_user DROP CONSTRAINT tbl_user_pkey;
       panel            postgres    false    343            U           2606    32889 (   telescope_entries telescope_entries_pkey 
   CONSTRAINT     k   ALTER TABLE ONLY panel.telescope_entries
    ADD CONSTRAINT telescope_entries_pkey PRIMARY KEY (sequence);
 Q   ALTER TABLE ONLY panel.telescope_entries DROP CONSTRAINT telescope_entries_pkey;
       panel            postgres    false    326            X           2606    32891 /   telescope_entries telescope_entries_uuid_unique 
   CONSTRAINT     i   ALTER TABLE ONLY panel.telescope_entries
    ADD CONSTRAINT telescope_entries_uuid_unique UNIQUE (uuid);
 X   ALTER TABLE ONLY panel.telescope_entries DROP CONSTRAINT telescope_entries_uuid_unique;
       panel            postgres    false    326            \           2606    32916    verifybackup verifybackup_pkey 
   CONSTRAINT     [   ALTER TABLE ONLY panel.verifybackup
    ADD CONSTRAINT verifybackup_pkey PRIMARY KEY (id);
 G   ALTER TABLE ONLY panel.verifybackup DROP CONSTRAINT verifybackup_pkey;
       panel            postgres    false    330            �           2606    19146    AccessToken AccessToken_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."AccessToken"
    ADD CONSTRAINT "AccessToken_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."AccessToken" DROP CONSTRAINT "AccessToken_pkey";
       public            postgres    false    221            �           2606    19154    Account Account_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public."Account"
    ADD CONSTRAINT "Account_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public."Account" DROP CONSTRAINT "Account_pkey";
       public            postgres    false    222            �           2606    19162 ,   BatalTenderProposal BatalTenderProposal_pkey 
   CONSTRAINT     n   ALTER TABLE ONLY public."BatalTenderProposal"
    ADD CONSTRAINT "BatalTenderProposal_pkey" PRIMARY KEY (id);
 Z   ALTER TABLE ONLY public."BatalTenderProposal" DROP CONSTRAINT "BatalTenderProposal_pkey";
       public            postgres    false    223            �           2606    19192 *   JasaDiskusiBalasan JasaDiskusiBalasan_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public."JasaDiskusiBalasan"
    ADD CONSTRAINT "JasaDiskusiBalasan_pkey" PRIMARY KEY (id);
 X   ALTER TABLE ONLY public."JasaDiskusiBalasan" DROP CONSTRAINT "JasaDiskusiBalasan_pkey";
       public            postgres    false    226            �           2606    19184    JasaDiskusi JasaDiskusi_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."JasaDiskusi"
    ADD CONSTRAINT "JasaDiskusi_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."JasaDiskusi" DROP CONSTRAINT "JasaDiskusi_pkey";
       public            postgres    false    225            �           2606    19200    JasaDoc JasaDoc_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public."JasaDoc"
    ADD CONSTRAINT "JasaDoc_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public."JasaDoc" DROP CONSTRAINT "JasaDoc_pkey";
       public            postgres    false    227            �           2606    19208    JasaFaq JasaFaq_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public."JasaFaq"
    ADD CONSTRAINT "JasaFaq_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public."JasaFaq" DROP CONSTRAINT "JasaFaq_pkey";
       public            postgres    false    228            �           2606    19824    JasaPricing JasaPricing_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."JasaPricing"
    ADD CONSTRAINT "JasaPricing_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."JasaPricing" DROP CONSTRAINT "JasaPricing_pkey";
       public            postgres    false    229            �           2606    19826 $   JasaRequirement JasaRequirement_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public."JasaRequirement"
    ADD CONSTRAINT "JasaRequirement_pkey" PRIMARY KEY (id);
 R   ALTER TABLE ONLY public."JasaRequirement" DROP CONSTRAINT "JasaRequirement_pkey";
       public            postgres    false    230            �           2606    19828 &   JasaReviewDetail JasaReviewDetail_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public."JasaReviewDetail"
    ADD CONSTRAINT "JasaReviewDetail_pkey" PRIMARY KEY (id);
 T   ALTER TABLE ONLY public."JasaReviewDetail" DROP CONSTRAINT "JasaReviewDetail_pkey";
       public            postgres    false    232            �           2606    19830    JasaReview JasaReview_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."JasaReview"
    ADD CONSTRAINT "JasaReview_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."JasaReview" DROP CONSTRAINT "JasaReview_pkey";
       public            postgres    false    231            �           2606    19176    Jasa Jasa_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public."Jasa"
    ADD CONSTRAINT "Jasa_pkey" PRIMARY KEY (id);
 <   ALTER TABLE ONLY public."Jasa" DROP CONSTRAINT "Jasa_pkey";
       public            postgres    false    224            �           2606    19832    MsAktifitas MsAktifitas_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."MsAktifitas"
    ADD CONSTRAINT "MsAktifitas_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."MsAktifitas" DROP CONSTRAINT "MsAktifitas_pkey";
       public            postgres    false    238            �           2606    19834 6   MsAlasanPembatalanTender MsAlasanPembatalanTender_pkey 
   CONSTRAINT     x   ALTER TABLE ONLY public."MsAlasanPembatalanTender"
    ADD CONSTRAINT "MsAlasanPembatalanTender_pkey" PRIMARY KEY (id);
 d   ALTER TABLE ONLY public."MsAlasanPembatalanTender" DROP CONSTRAINT "MsAlasanPembatalanTender_pkey";
       public            postgres    false    239            �           2606    19836    MsBahasa MsBahasa_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public."MsBahasa"
    ADD CONSTRAINT "MsBahasa_pkey" PRIMARY KEY (id);
 D   ALTER TABLE ONLY public."MsBahasa" DROP CONSTRAINT "MsBahasa_pkey";
       public            postgres    false    240            �           2606    19838    MsBank MsBank_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public."MsBank"
    ADD CONSTRAINT "MsBank_pkey" PRIMARY KEY (id);
 @   ALTER TABLE ONLY public."MsBank" DROP CONSTRAINT "MsBank_pkey";
       public            postgres    false    241            �           2606    19840    MsFee MsFee_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public."MsFee"
    ADD CONSTRAINT "MsFee_pkey" PRIMARY KEY (id);
 >   ALTER TABLE ONLY public."MsFee" DROP CONSTRAINT "MsFee_pkey";
       public            postgres    false    242            �           2606    19842    MsKategori MsKategori_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."MsKategori"
    ADD CONSTRAINT "MsKategori_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."MsKategori" DROP CONSTRAINT "MsKategori_pkey";
       public            postgres    false    243            �           2606    19844    MsKota MsKota_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public."MsKota"
    ADD CONSTRAINT "MsKota_pkey" PRIMARY KEY (id);
 @   ALTER TABLE ONLY public."MsKota" DROP CONSTRAINT "MsKota_pkey";
       public            postgres    false    244            �           2606    19846 "   MsKurirLayanan MsKurirLayanan_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."MsKurirLayanan"
    ADD CONSTRAINT "MsKurirLayanan_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."MsKurirLayanan" DROP CONSTRAINT "MsKurirLayanan_pkey";
       public            postgres    false    246            �           2606    19848    MsKurir MsKurir_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public."MsKurir"
    ADD CONSTRAINT "MsKurir_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public."MsKurir" DROP CONSTRAINT "MsKurir_pkey";
       public            postgres    false    245            �           2606    19850 2   MsMerchantLevelBenefit MsMerchantLevelBenefit_pkey 
   CONSTRAINT     t   ALTER TABLE ONLY public."MsMerchantLevelBenefit"
    ADD CONSTRAINT "MsMerchantLevelBenefit_pkey" PRIMARY KEY (id);
 `   ALTER TABLE ONLY public."MsMerchantLevelBenefit" DROP CONSTRAINT "MsMerchantLevelBenefit_pkey";
       public            postgres    false    248            �           2606    19852 $   MsMerchantLevel MsMerchantLevel_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public."MsMerchantLevel"
    ADD CONSTRAINT "MsMerchantLevel_pkey" PRIMARY KEY (id);
 R   ALTER TABLE ONLY public."MsMerchantLevel" DROP CONSTRAINT "MsMerchantLevel_pkey";
       public            postgres    false    247            �           2606    19854    MsNegara MsNegara_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public."MsNegara"
    ADD CONSTRAINT "MsNegara_pkey" PRIMARY KEY (id);
 D   ALTER TABLE ONLY public."MsNegara" DROP CONSTRAINT "MsNegara_pkey";
       public            postgres    false    249            �           2606    19856 (   MsNotifikasiGroup MsNotifikasiGroup_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public."MsNotifikasiGroup"
    ADD CONSTRAINT "MsNotifikasiGroup_pkey" PRIMARY KEY (id);
 V   ALTER TABLE ONLY public."MsNotifikasiGroup" DROP CONSTRAINT "MsNotifikasiGroup_pkey";
       public            postgres    false    251            �           2606    19858    MsNotifikasi MsNotifikasi_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."MsNotifikasi"
    ADD CONSTRAINT "MsNotifikasi_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."MsNotifikasi" DROP CONSTRAINT "MsNotifikasi_pkey";
       public            postgres    false    250            �           2606    19860 $   MsPaymentMethod MsPaymentMethod_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public."MsPaymentMethod"
    ADD CONSTRAINT "MsPaymentMethod_pkey" PRIMARY KEY (id);
 R   ALTER TABLE ONLY public."MsPaymentMethod" DROP CONSTRAINT "MsPaymentMethod_pkey";
       public            postgres    false    252            �           2606    19862    MsPekerjaan MsPekerjaan_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."MsPekerjaan"
    ADD CONSTRAINT "MsPekerjaan_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."MsPekerjaan" DROP CONSTRAINT "MsPekerjaan_pkey";
       public            postgres    false    253            �           2606    19864 $   MsPostingTender MsPostingTender_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public."MsPostingTender"
    ADD CONSTRAINT "MsPostingTender_pkey" PRIMARY KEY (id);
 R   ALTER TABLE ONLY public."MsPostingTender" DROP CONSTRAINT "MsPostingTender_pkey";
       public            postgres    false    254            �           2606    19866    MsProvinsi MsProvinsi_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."MsProvinsi"
    ADD CONSTRAINT "MsProvinsi_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."MsProvinsi" DROP CONSTRAINT "MsProvinsi_pkey";
       public            postgres    false    255            �           2606    19868     MsReviewPoint MsReviewPoint_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public."MsReviewPoint"
    ADD CONSTRAINT "MsReviewPoint_pkey" PRIMARY KEY (id);
 N   ALTER TABLE ONLY public."MsReviewPoint" DROP CONSTRAINT "MsReviewPoint_pkey";
       public            postgres    false    256            �           2606    19870    MsStatusAkun MsStatusAkun_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."MsStatusAkun"
    ADD CONSTRAINT "MsStatusAkun_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."MsStatusAkun" DROP CONSTRAINT "MsStatusAkun_pkey";
       public            postgres    false    257            �           2606    19872    MsStatusJasa MsStatusJasa_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."MsStatusJasa"
    ADD CONSTRAINT "MsStatusJasa_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."MsStatusJasa" DROP CONSTRAINT "MsStatusJasa_pkey";
       public            postgres    false    258            �           2606    19874 "   MsStatusSeller MsStatusSeller_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."MsStatusSeller"
    ADD CONSTRAINT "MsStatusSeller_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."MsStatusSeller" DROP CONSTRAINT "MsStatusSeller_pkey";
       public            postgres    false    259            �           2606    19876 "   MsStatusTender MsStatusTender_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."MsStatusTender"
    ADD CONSTRAINT "MsStatusTender_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."MsStatusTender" DROP CONSTRAINT "MsStatusTender_pkey";
       public            postgres    false    260            �           2606    19878     MsSubkategori MsSubkategori_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public."MsSubkategori"
    ADD CONSTRAINT "MsSubkategori_pkey" PRIMARY KEY (id);
 N   ALTER TABLE ONLY public."MsSubkategori" DROP CONSTRAINT "MsSubkategori_pkey";
       public            postgres    false    261            �           2606    19880 &   MsTingkatEdukasi MsTingkatEdukasi_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public."MsTingkatEdukasi"
    ADD CONSTRAINT "MsTingkatEdukasi_pkey" PRIMARY KEY (id);
 T   ALTER TABLE ONLY public."MsTingkatEdukasi" DROP CONSTRAINT "MsTingkatEdukasi_pkey";
       public            postgres    false    262            �           2606    19882    Notification Notification_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."Notification"
    ADD CONSTRAINT "Notification_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."Notification" DROP CONSTRAINT "Notification_pkey";
       public            postgres    false    263            �           2606    19884 "   ObrolanContent ObrolanContent_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."ObrolanContent"
    ADD CONSTRAINT "ObrolanContent_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."ObrolanContent" DROP CONSTRAINT "ObrolanContent_pkey";
       public            postgres    false    265            �           2606    19886    Obrolan Obrolan_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public."Obrolan"
    ADD CONSTRAINT "Obrolan_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public."Obrolan" DROP CONSTRAINT "Obrolan_pkey";
       public            postgres    false    264            �           2606    19888 "   OrderAktifitas OrderAktifitas_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."OrderAktifitas"
    ADD CONSTRAINT "OrderAktifitas_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."OrderAktifitas" DROP CONSTRAINT "OrderAktifitas_pkey";
       public            postgres    false    267            �           2606    19890    OrderFee OrderFee_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public."OrderFee"
    ADD CONSTRAINT "OrderFee_pkey" PRIMARY KEY (id);
 D   ALTER TABLE ONLY public."OrderFee" DROP CONSTRAINT "OrderFee_pkey";
       public            postgres    false    268            �           2606    19892 .   OrderHasilAttachment OrderHasilAttachment_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public."OrderHasilAttachment"
    ADD CONSTRAINT "OrderHasilAttachment_pkey" PRIMARY KEY (id);
 \   ALTER TABLE ONLY public."OrderHasilAttachment" DROP CONSTRAINT "OrderHasilAttachment_pkey";
       public            postgres    false    270            �           2606    19894    OrderHasil OrderHasil_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."OrderHasil"
    ADD CONSTRAINT "OrderHasil_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."OrderHasil" DROP CONSTRAINT "OrderHasil_pkey";
       public            postgres    false    269            �           2606    19896 (   OrderJasaKepuasan OrderJasaKepuasan_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public."OrderJasaKepuasan"
    ADD CONSTRAINT "OrderJasaKepuasan_pkey" PRIMARY KEY (id);
 V   ALTER TABLE ONLY public."OrderJasaKepuasan" DROP CONSTRAINT "OrderJasaKepuasan_pkey";
       public            postgres    false    271            �           2606    19898    OrderJasa OrderJasa_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public."OrderJasa"
    ADD CONSTRAINT "OrderJasa_pkey" PRIMARY KEY (id);
 F   ALTER TABLE ONLY public."OrderJasa" DROP CONSTRAINT "OrderJasa_pkey";
       public            postgres    false    236            �           2606    19900 ,   OrderPaymentHistory OrderPaymentHistory_pkey 
   CONSTRAINT     n   ALTER TABLE ONLY public."OrderPaymentHistory"
    ADD CONSTRAINT "OrderPaymentHistory_pkey" PRIMARY KEY (id);
 Z   ALTER TABLE ONLY public."OrderPaymentHistory" DROP CONSTRAINT "OrderPaymentHistory_pkey";
       public            postgres    false    273            �           2606    19902    OrderPayment OrderPayment_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."OrderPayment"
    ADD CONSTRAINT "OrderPayment_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."OrderPayment" DROP CONSTRAINT "OrderPayment_pkey";
       public            postgres    false    272            �           2606    19904 $   OrderPengiriman OrderPengiriman_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public."OrderPengiriman"
    ADD CONSTRAINT "OrderPengiriman_pkey" PRIMARY KEY (id);
 R   ALTER TABLE ONLY public."OrderPengiriman" DROP CONSTRAINT "OrderPengiriman_pkey";
       public            postgres    false    274            �           2606    19906    OrderTermin OrderTermin_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."OrderTermin"
    ADD CONSTRAINT "OrderTermin_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."OrderTermin" DROP CONSTRAINT "OrderTermin_pkey";
       public            postgres    false    275            �           2606    19908    Order Order_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public."Order"
    ADD CONSTRAINT "Order_pkey" PRIMARY KEY (id);
 >   ALTER TABLE ONLY public."Order" DROP CONSTRAINT "Order_pkey";
       public            postgres    false    235            �           2606    19910    Pencairan Pencairan_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public."Pencairan"
    ADD CONSTRAINT "Pencairan_pkey" PRIMARY KEY (id);
 F   ALTER TABLE ONLY public."Pencairan" DROP CONSTRAINT "Pencairan_pkey";
       public            postgres    false    276            �           2606    19912    Penghasilan Penghasilan_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."Penghasilan"
    ADD CONSTRAINT "Penghasilan_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."Penghasilan" DROP CONSTRAINT "Penghasilan_pkey";
       public            postgres    false    279            �           2606    19914 6   PenjualPengaturanCatatan PenjualPengaturanCatatan_pkey 
   CONSTRAINT     x   ALTER TABLE ONLY public."PenjualPengaturanCatatan"
    ADD CONSTRAINT "PenjualPengaturanCatatan_pkey" PRIMARY KEY (id);
 d   ALTER TABLE ONLY public."PenjualPengaturanCatatan" DROP CONSTRAINT "PenjualPengaturanCatatan_pkey";
       public            postgres    false    280            �           2606    19916 >   PenjualPengaturanJadwalLibur PenjualPengaturanJadwalLibur_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanJadwalLibur"
    ADD CONSTRAINT "PenjualPengaturanJadwalLibur_pkey" PRIMARY KEY (id);
 l   ALTER TABLE ONLY public."PenjualPengaturanJadwalLibur" DROP CONSTRAINT "PenjualPengaturanJadwalLibur_pkey";
       public            postgres    false    281            �           2606    19918 J   PenjualPengaturanJadwalOperasional PenjualPengaturanJadwalOperasional_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanJadwalOperasional"
    ADD CONSTRAINT "PenjualPengaturanJadwalOperasional_pkey" PRIMARY KEY (id);
 x   ALTER TABLE ONLY public."PenjualPengaturanJadwalOperasional" DROP CONSTRAINT "PenjualPengaturanJadwalOperasional_pkey";
       public            postgres    false    282                       2606    19920 H   PenjualPengaturanPengirimanDetail PenjualPengaturanPengirimanDetail_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanPengirimanDetail"
    ADD CONSTRAINT "PenjualPengaturanPengirimanDetail_pkey" PRIMARY KEY (id);
 v   ALTER TABLE ONLY public."PenjualPengaturanPengirimanDetail" DROP CONSTRAINT "PenjualPengaturanPengirimanDetail_pkey";
       public            postgres    false    284            �           2606    19922 <   PenjualPengaturanPengiriman PenjualPengaturanPengiriman_pkey 
   CONSTRAINT     ~   ALTER TABLE ONLY public."PenjualPengaturanPengiriman"
    ADD CONSTRAINT "PenjualPengaturanPengiriman_pkey" PRIMARY KEY (id);
 j   ALTER TABLE ONLY public."PenjualPengaturanPengiriman" DROP CONSTRAINT "PenjualPengaturanPengiriman_pkey";
       public            postgres    false    283                       2606    19924 D   PenjualPengaturanProdukUnggulan PenjualPengaturanProdukUnggulan_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanProdukUnggulan"
    ADD CONSTRAINT "PenjualPengaturanProdukUnggulan_pkey" PRIMARY KEY (id);
 r   ALTER TABLE ONLY public."PenjualPengaturanProdukUnggulan" DROP CONSTRAINT "PenjualPengaturanProdukUnggulan_pkey";
       public            postgres    false    285                       2606    19926 F   PenjualPengaturanTemplateBalasan PenjualPengaturanTemplateBalasan_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanTemplateBalasan"
    ADD CONSTRAINT "PenjualPengaturanTemplateBalasan_pkey" PRIMARY KEY (id);
 t   ALTER TABLE ONLY public."PenjualPengaturanTemplateBalasan" DROP CONSTRAINT "PenjualPengaturanTemplateBalasan_pkey";
       public            postgres    false    286                       2606    19928    PenjualScore PenjualScore_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."PenjualScore"
    ADD CONSTRAINT "PenjualScore_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."PenjualScore" DROP CONSTRAINT "PenjualScore_pkey";
       public            postgres    false    287            
           2606    19930    Portofolio Portofolio_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."Portofolio"
    ADD CONSTRAINT "Portofolio_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."Portofolio" DROP CONSTRAINT "Portofolio_pkey";
       public            postgres    false    288                       2606    19932 "   ProgresPeserta ProgresPeserta_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."ProgresPeserta"
    ADD CONSTRAINT "ProgresPeserta_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."ProgresPeserta" DROP CONSTRAINT "ProgresPeserta_pkey";
       public            postgres    false    289                       2606    19934    Resume Resume_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public."Resume"
    ADD CONSTRAINT "Resume_pkey" PRIMARY KEY (id);
 @   ALTER TABLE ONLY public."Resume" DROP CONSTRAINT "Resume_pkey";
       public            postgres    false    291            �           2606    19936    Saldo Saldo_pkey 
   CONSTRAINT     R   ALTER TABLE ONLY public."Saldo"
    ADD CONSTRAINT "Saldo_pkey" PRIMARY KEY (id);
 >   ALTER TABLE ONLY public."Saldo" DROP CONSTRAINT "Saldo_pkey";
       public            postgres    false    277                       2606    19938    Session Session_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public."Session"
    ADD CONSTRAINT "Session_pkey" PRIMARY KEY (id);
 B   ALTER TABLE ONLY public."Session" DROP CONSTRAINT "Session_pkey";
       public            postgres    false    292                       2606    19940 $   TenderAktifitas TenderAktifitas_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public."TenderAktifitas"
    ADD CONSTRAINT "TenderAktifitas_pkey" PRIMARY KEY (id);
 R   ALTER TABLE ONLY public."TenderAktifitas" DROP CONSTRAINT "TenderAktifitas_pkey";
       public            postgres    false    294                       2606    19942     TenderKontrak TenderKontrak_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public."TenderKontrak"
    ADD CONSTRAINT "TenderKontrak_pkey" PRIMARY KEY (id);
 N   ALTER TABLE ONLY public."TenderKontrak" DROP CONSTRAINT "TenderKontrak_pkey";
       public            postgres    false    295                       2606    19944     TenderPeserta TenderPeserta_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public."TenderPeserta"
    ADD CONSTRAINT "TenderPeserta_pkey" PRIMARY KEY (id);
 N   ALTER TABLE ONLY public."TenderPeserta" DROP CONSTRAINT "TenderPeserta_pkey";
       public            postgres    false    296                       2606    19946    Tender Tender_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public."Tender"
    ADD CONSTRAINT "Tender_pkey" PRIMARY KEY (id);
 @   ALTER TABLE ONLY public."Tender" DROP CONSTRAINT "Tender_pkey";
       public            postgres    false    293                        2606    19948    UserAlamat UserAlamat_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."UserAlamat"
    ADD CONSTRAINT "UserAlamat_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."UserAlamat" DROP CONSTRAINT "UserAlamat_pkey";
       public            postgres    false    298            "           2606    19950    UserBahasa UserBahasa_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."UserBahasa"
    ADD CONSTRAINT "UserBahasa_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."UserBahasa" DROP CONSTRAINT "UserBahasa_pkey";
       public            postgres    false    299            $           2606    19952    UserEdukasi UserEdukasi_pkey 
   CONSTRAINT     ^   ALTER TABLE ONLY public."UserEdukasi"
    ADD CONSTRAINT "UserEdukasi_pkey" PRIMARY KEY (id);
 J   ALTER TABLE ONLY public."UserEdukasi" DROP CONSTRAINT "UserEdukasi_pkey";
       public            postgres    false    300            &           2606    19954     UserFollowing UserFollowing_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public."UserFollowing"
    ADD CONSTRAINT "UserFollowing_pkey" PRIMARY KEY (id);
 N   ALTER TABLE ONLY public."UserFollowing" DROP CONSTRAINT "UserFollowing_pkey";
       public            postgres    false    301            (           2606    19956 *   UserForgetPassword UserForgetPassword_pkey 
   CONSTRAINT     l   ALTER TABLE ONLY public."UserForgetPassword"
    ADD CONSTRAINT "UserForgetPassword_pkey" PRIMARY KEY (id);
 X   ALTER TABLE ONLY public."UserForgetPassword" DROP CONSTRAINT "UserForgetPassword_pkey";
       public            postgres    false    303            *           2606    19958    UserKeahlian UserKeahlian_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."UserKeahlian"
    ADD CONSTRAINT "UserKeahlian_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."UserKeahlian" DROP CONSTRAINT "UserKeahlian_pkey";
       public            postgres    false    304            ,           2606    19960    UserKepuasan UserKepuasan_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."UserKepuasan"
    ADD CONSTRAINT "UserKepuasan_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."UserKepuasan" DROP CONSTRAINT "UserKepuasan_pkey";
       public            postgres    false    305            /           2606    19962 "   UserNotifikasi UserNotifikasi_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."UserNotifikasi"
    ADD CONSTRAINT "UserNotifikasi_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."UserNotifikasi" DROP CONSTRAINT "UserNotifikasi_pkey";
       public            postgres    false    306            1           2606    19964    UserRekening UserRekening_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public."UserRekening"
    ADD CONSTRAINT "UserRekening_pkey" PRIMARY KEY (id);
 L   ALTER TABLE ONLY public."UserRekening" DROP CONSTRAINT "UserRekening_pkey";
       public            postgres    false    307            3           2606    19966 "   UserSertifikat UserSertifikat_pkey 
   CONSTRAINT     d   ALTER TABLE ONLY public."UserSertifikat"
    ADD CONSTRAINT "UserSertifikat_pkey" PRIMARY KEY (id);
 P   ALTER TABLE ONLY public."UserSertifikat" DROP CONSTRAINT "UserSertifikat_pkey";
       public            postgres    false    308            5           2606    19968 (   UserTenderFavorit UserTenderFavorit_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public."UserTenderFavorit"
    ADD CONSTRAINT "UserTenderFavorit_pkey" PRIMARY KEY (id);
 V   ALTER TABLE ONLY public."UserTenderFavorit" DROP CONSTRAINT "UserTenderFavorit_pkey";
       public            postgres    false    309            7           2606    19970    UserVaOpen UserVaOpen_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public."UserVaOpen"
    ADD CONSTRAINT "UserVaOpen_pkey" PRIMARY KEY (id);
 H   ALTER TABLE ONLY public."UserVaOpen" DROP CONSTRAINT "UserVaOpen_pkey";
       public            postgres    false    310            9           2606    19972 &   UserVerification UserVerification_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public."UserVerification"
    ADD CONSTRAINT "UserVerification_pkey" PRIMARY KEY (id);
 T   ALTER TABLE ONLY public."UserVerification" DROP CONSTRAINT "UserVerification_pkey";
       public            postgres    false    311            ;           2606    19974     UserWhistlist UserWhistlist_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public."UserWhistlist"
    ADD CONSTRAINT "UserWhistlist_pkey" PRIMARY KEY (id);
 N   ALTER TABLE ONLY public."UserWhistlist" DROP CONSTRAINT "UserWhistlist_pkey";
       public            postgres    false    312                       2606    19976    User User_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public."User"
    ADD CONSTRAINT "User_pkey" PRIMARY KEY (id);
 <   ALTER TABLE ONLY public."User" DROP CONSTRAINT "User_pkey";
       public            postgres    false    297            {           2606    19122    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public            postgres    false    218            }           2606    19124 #   failed_jobs failed_jobs_uuid_unique 
   CONSTRAINT     ^   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);
 M   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_uuid_unique;
       public            postgres    false    218            t           2606    19089    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public            postgres    false    213            H           2606    20600 0   model_has_permissions model_has_permissions_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_pkey PRIMARY KEY (permission_id, model_id, model_type);
 Z   ALTER TABLE ONLY public.model_has_permissions DROP CONSTRAINT model_has_permissions_pkey;
       public            postgres    false    319    319    319            K           2606    20611 $   model_has_roles model_has_roles_pkey 
   CONSTRAINT     }   ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_pkey PRIMARY KEY (role_id, model_id, model_type);
 N   ALTER TABLE ONLY public.model_has_roles DROP CONSTRAINT model_has_roles_pkey;
       public            postgres    false    320    320    320            ?           2606    20576 .   permissions permissions_name_guard_name_unique 
   CONSTRAINT     u   ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_name_guard_name_unique UNIQUE (name, guard_name);
 X   ALTER TABLE ONLY public.permissions DROP CONSTRAINT permissions_name_guard_name_unique;
       public            postgres    false    316    316            A           2606    20574    permissions permissions_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.permissions
    ADD CONSTRAINT permissions_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.permissions DROP CONSTRAINT permissions_pkey;
       public            postgres    false    316                       2606    19135 2   personal_access_tokens personal_access_tokens_pkey 
   CONSTRAINT     p   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);
 \   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_pkey;
       public            postgres    false    220            �           2606    19138 :   personal_access_tokens personal_access_tokens_token_unique 
   CONSTRAINT     v   ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);
 d   ALTER TABLE ONLY public.personal_access_tokens DROP CONSTRAINT personal_access_tokens_token_unique;
       public            postgres    false    220            M           2606    20626 .   role_has_permissions role_has_permissions_pkey 
   CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_pkey PRIMARY KEY (permission_id, role_id);
 X   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_pkey;
       public            postgres    false    321    321            C           2606    20589 "   roles roles_name_guard_name_unique 
   CONSTRAINT     i   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_name_guard_name_unique UNIQUE (name, guard_name);
 L   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_name_guard_name_unique;
       public            postgres    false    318    318            E           2606    20587    roles roles_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.roles
    ADD CONSTRAINT roles_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.roles DROP CONSTRAINT roles_pkey;
       public            postgres    false    318            v           2606    19103    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public            postgres    false    215            x           2606    19101    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public            postgres    false    215            n           1259    32975 /   model_has_permissions_model_id_model_type_index    INDEX     �   CREATE INDEX model_has_permissions_model_id_model_type_index ON panel.model_has_permissions USING btree (model_id, model_type);
 B   DROP INDEX panel.model_has_permissions_model_id_model_type_index;
       panel            postgres    false    339    339            q           1259    32986 )   model_has_roles_model_id_model_type_index    INDEX     t   CREATE INDEX model_has_roles_model_id_model_type_index ON panel.model_has_roles USING btree (model_id, model_type);
 <   DROP INDEX panel.model_has_roles_model_id_model_type_index;
       panel            postgres    false    340    340            P           1259    32877    password_resets_email_index    INDEX     W   CREATE INDEX password_resets_email_index ON panel.password_resets USING btree (email);
 .   DROP INDEX panel.password_resets_email_index;
       panel            postgres    false    324            e           1259    32942 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON panel.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 K   DROP INDEX panel.personal_access_tokens_tokenable_type_tokenable_id_index;
       panel            postgres    false    334    334            Q           1259    32892     telescope_entries_batch_id_index    INDEX     a   CREATE INDEX telescope_entries_batch_id_index ON panel.telescope_entries USING btree (batch_id);
 3   DROP INDEX panel.telescope_entries_batch_id_index;
       panel            postgres    false    326            R           1259    32894 "   telescope_entries_created_at_index    INDEX     e   CREATE INDEX telescope_entries_created_at_index ON panel.telescope_entries USING btree (created_at);
 5   DROP INDEX panel.telescope_entries_created_at_index;
       panel            postgres    false    326            S           1259    32893 #   telescope_entries_family_hash_index    INDEX     g   CREATE INDEX telescope_entries_family_hash_index ON panel.telescope_entries USING btree (family_hash);
 6   DROP INDEX panel.telescope_entries_family_hash_index;
       panel            postgres    false    326            Y           1259    32899 +   telescope_entries_tags_entry_uuid_tag_index    INDEX     x   CREATE INDEX telescope_entries_tags_entry_uuid_tag_index ON panel.telescope_entries_tags USING btree (entry_uuid, tag);
 >   DROP INDEX panel.telescope_entries_tags_entry_uuid_tag_index;
       panel            postgres    false    327    327            Z           1259    32900     telescope_entries_tags_tag_index    INDEX     a   CREATE INDEX telescope_entries_tags_tag_index ON panel.telescope_entries_tags USING btree (tag);
 3   DROP INDEX panel.telescope_entries_tags_tag_index;
       panel            postgres    false    327            V           1259    32895 4   telescope_entries_type_should_display_on_index_index    INDEX     �   CREATE INDEX telescope_entries_type_should_display_on_index_index ON panel.telescope_entries USING btree (type, should_display_on_index);
 G   DROP INDEX panel.telescope_entries_type_should_display_on_index_index;
       panel            postgres    false    326    326            �           1259    19977    AccessToken_bank_key    INDEX     W   CREATE UNIQUE INDEX "AccessToken_bank_key" ON public."AccessToken" USING btree (bank);
 *   DROP INDEX public."AccessToken_bank_key";
       public            postgres    false    221            �           1259    19978 &   Account_provider_providerAccountId_key    INDEX     ~   CREATE UNIQUE INDEX "Account_provider_providerAccountId_key" ON public."Account" USING btree (provider, "providerAccountId");
 <   DROP INDEX public."Account_provider_providerAccountId_key";
       public            postgres    false    222    222            �           1259    19979    JasaReview_orderJasaId_key    INDEX     e   CREATE UNIQUE INDEX "JasaReview_orderJasaId_key" ON public."JasaReview" USING btree ("orderJasaId");
 0   DROP INDEX public."JasaReview_orderJasaId_key";
       public            postgres    false    231            �           1259    19980    Jasa_userId_slug_key    INDEX     Z   CREATE UNIQUE INDEX "Jasa_userId_slug_key" ON public."Jasa" USING btree ("userId", slug);
 *   DROP INDEX public."Jasa_userId_slug_key";
       public            postgres    false    224    224            �           1259    19981 (   OrderJasaKepuasan_orderJasaId_userId_key    INDEX     �   CREATE UNIQUE INDEX "OrderJasaKepuasan_orderJasaId_userId_key" ON public."OrderJasaKepuasan" USING btree ("orderJasaId", "userId");
 >   DROP INDEX public."OrderJasaKepuasan_orderJasaId_userId_key";
       public            postgres    false    271    271            �           1259    19982    OrderPayment_orderId_key    INDEX     a   CREATE UNIQUE INDEX "OrderPayment_orderId_key" ON public."OrderPayment" USING btree ("orderId");
 .   DROP INDEX public."OrderPayment_orderId_key";
       public            postgres    false    272            �           1259    19983    OrderPayment_orderTerminId_key    INDEX     m   CREATE UNIQUE INDEX "OrderPayment_orderTerminId_key" ON public."OrderPayment" USING btree ("orderTerminId");
 4   DROP INDEX public."OrderPayment_orderTerminId_key";
       public            postgres    false    272            �           1259    19984    OrderPengiriman_orderId_key    INDEX     g   CREATE UNIQUE INDEX "OrderPengiriman_orderId_key" ON public."OrderPengiriman" USING btree ("orderId");
 1   DROP INDEX public."OrderPengiriman_orderId_key";
       public            postgres    false    274            �           1259    19985 '   PenjualPengaturanJadwalLibur_userId_key    INDEX        CREATE UNIQUE INDEX "PenjualPengaturanJadwalLibur_userId_key" ON public."PenjualPengaturanJadwalLibur" USING btree ("userId");
 =   DROP INDEX public."PenjualPengaturanJadwalLibur_userId_key";
       public            postgres    false    281                        1259    19986 &   PenjualPengaturanPengiriman_userId_key    INDEX     }   CREATE UNIQUE INDEX "PenjualPengaturanPengiriman_userId_key" ON public."PenjualPengaturanPengiriman" USING btree ("userId");
 <   DROP INDEX public."PenjualPengaturanPengiriman_userId_key";
       public            postgres    false    283                       1259    19987    Session_sessionToken_key    INDEX     a   CREATE UNIQUE INDEX "Session_sessionToken_key" ON public."Session" USING btree ("sessionToken");
 .   DROP INDEX public."Session_sessionToken_key";
       public            postgres    false    292                       1259    19988    Tender_slug_key    INDEX     M   CREATE UNIQUE INDEX "Tender_slug_key" ON public."Tender" USING btree (slug);
 %   DROP INDEX public."Tender_slug_key";
       public            postgres    false    293            -           1259    19989 !   UserKepuasan_userId_createdBy_key    INDEX     v   CREATE UNIQUE INDEX "UserKepuasan_userId_createdBy_key" ON public."UserKepuasan" USING btree ("userId", "createdBy");
 7   DROP INDEX public."UserKepuasan_userId_createdBy_key";
       public            postgres    false    305    305                       1259    19990    User_email_key    INDEX     K   CREATE UNIQUE INDEX "User_email_key" ON public."User" USING btree (email);
 $   DROP INDEX public."User_email_key";
       public            postgres    false    297                       1259    19991    User_phone_key    INDEX     K   CREATE UNIQUE INDEX "User_phone_key" ON public."User" USING btree (phone);
 $   DROP INDEX public."User_phone_key";
       public            postgres    false    297            <           1259    19992 &   VerificationToken_identifier_token_key    INDEX     |   CREATE UNIQUE INDEX "VerificationToken_identifier_token_key" ON public."VerificationToken" USING btree (identifier, token);
 <   DROP INDEX public."VerificationToken_identifier_token_key";
       public            postgres    false    314    314            =           1259    19993    VerificationToken_token_key    INDEX     e   CREATE UNIQUE INDEX "VerificationToken_token_key" ON public."VerificationToken" USING btree (token);
 1   DROP INDEX public."VerificationToken_token_key";
       public            postgres    false    314            F           1259    20593 /   model_has_permissions_model_id_model_type_index    INDEX     �   CREATE INDEX model_has_permissions_model_id_model_type_index ON public.model_has_permissions USING btree (model_id, model_type);
 C   DROP INDEX public.model_has_permissions_model_id_model_type_index;
       public            postgres    false    319    319            I           1259    20604 )   model_has_roles_model_id_model_type_index    INDEX     u   CREATE INDEX model_has_roles_model_id_model_type_index ON public.model_has_roles USING btree (model_id, model_type);
 =   DROP INDEX public.model_has_roles_model_id_model_type_index;
       public            postgres    false    320    320            y           1259    19110    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public            postgres    false    216            �           1259    19136 8   personal_access_tokens_tokenable_type_tokenable_id_index    INDEX     �   CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);
 L   DROP INDEX public.personal_access_tokens_tokenable_type_tokenable_id_index;
       public            postgres    false    220    220            �           2606    32976 A   model_has_permissions model_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY panel.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES panel.permissions(id) ON DELETE CASCADE;
 j   ALTER TABLE ONLY panel.model_has_permissions DROP CONSTRAINT model_has_permissions_permission_id_foreign;
       panel          postgres    false    3945    339    336            �           2606    32987 /   model_has_roles model_has_roles_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY panel.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES panel.roles(id) ON DELETE CASCADE;
 X   ALTER TABLE ONLY panel.model_has_roles DROP CONSTRAINT model_has_roles_role_id_foreign;
       panel          postgres    false    338    340    3949            �           2606    32997 ?   role_has_permissions role_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY panel.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES panel.permissions(id) ON DELETE CASCADE;
 h   ALTER TABLE ONLY panel.role_has_permissions DROP CONSTRAINT role_has_permissions_permission_id_foreign;
       panel          postgres    false    341    336    3945            �           2606    33002 9   role_has_permissions role_has_permissions_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY panel.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES panel.roles(id) ON DELETE CASCADE;
 b   ALTER TABLE ONLY panel.role_has_permissions DROP CONSTRAINT role_has_permissions_role_id_foreign;
       panel          postgres    false    338    341    3949            �           2606    32901 @   telescope_entries_tags telescope_entries_tags_entry_uuid_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY panel.telescope_entries_tags
    ADD CONSTRAINT telescope_entries_tags_entry_uuid_foreign FOREIGN KEY (entry_uuid) REFERENCES panel.telescope_entries(uuid) ON DELETE CASCADE;
 i   ALTER TABLE ONLY panel.telescope_entries_tags DROP CONSTRAINT telescope_entries_tags_entry_uuid_foreign;
       panel          postgres    false    3928    327    326            z           2606    19994    Account Account_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Account"
    ADD CONSTRAINT "Account_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 I   ALTER TABLE ONLY public."Account" DROP CONSTRAINT "Account_userId_fkey";
       public          postgres    false    3870    222    297            {           2606    19999 G   BatalTenderProposal BatalTenderProposal_msAlasanPembatalanTenderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."BatalTenderProposal"
    ADD CONSTRAINT "BatalTenderProposal_msAlasanPembatalanTenderId_fkey" FOREIGN KEY ("msAlasanPembatalanTenderId") REFERENCES public."MsAlasanPembatalanTender"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 u   ALTER TABLE ONLY public."BatalTenderProposal" DROP CONSTRAINT "BatalTenderProposal_msAlasanPembatalanTenderId_fkey";
       public          postgres    false    239    223    3750            |           2606    20004 <   BatalTenderProposal BatalTenderProposal_tenderPesertaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."BatalTenderProposal"
    ADD CONSTRAINT "BatalTenderProposal_tenderPesertaId_fkey" FOREIGN KEY ("tenderPesertaId") REFERENCES public."TenderPeserta"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 j   ALTER TABLE ONLY public."BatalTenderProposal" DROP CONSTRAINT "BatalTenderProposal_tenderPesertaId_fkey";
       public          postgres    false    223    296    3866            �           2606    20009 8   JasaDiskusiBalasan JasaDiskusiBalasan_jasaDiskusiId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaDiskusiBalasan"
    ADD CONSTRAINT "JasaDiskusiBalasan_jasaDiskusiId_fkey" FOREIGN KEY ("jasaDiskusiId") REFERENCES public."JasaDiskusi"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 f   ALTER TABLE ONLY public."JasaDiskusiBalasan" DROP CONSTRAINT "JasaDiskusiBalasan_jasaDiskusiId_fkey";
       public          postgres    false    226    3727    225            �           2606    20014 1   JasaDiskusiBalasan JasaDiskusiBalasan_jasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaDiskusiBalasan"
    ADD CONSTRAINT "JasaDiskusiBalasan_jasaId_fkey" FOREIGN KEY ("jasaId") REFERENCES public."Jasa"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 _   ALTER TABLE ONLY public."JasaDiskusiBalasan" DROP CONSTRAINT "JasaDiskusiBalasan_jasaId_fkey";
       public          postgres    false    224    3724    226            �           2606    20019 1   JasaDiskusiBalasan JasaDiskusiBalasan_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaDiskusiBalasan"
    ADD CONSTRAINT "JasaDiskusiBalasan_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 _   ALTER TABLE ONLY public."JasaDiskusiBalasan" DROP CONSTRAINT "JasaDiskusiBalasan_userId_fkey";
       public          postgres    false    3870    226    297            �           2606    20024 #   JasaDiskusi JasaDiskusi_jasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaDiskusi"
    ADD CONSTRAINT "JasaDiskusi_jasaId_fkey" FOREIGN KEY ("jasaId") REFERENCES public."Jasa"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public."JasaDiskusi" DROP CONSTRAINT "JasaDiskusi_jasaId_fkey";
       public          postgres    false    224    225    3724            �           2606    20029 #   JasaDiskusi JasaDiskusi_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaDiskusi"
    ADD CONSTRAINT "JasaDiskusi_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public."JasaDiskusi" DROP CONSTRAINT "JasaDiskusi_userId_fkey";
       public          postgres    false    3870    225    297            �           2606    20034    JasaDoc JasaDoc_jasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaDoc"
    ADD CONSTRAINT "JasaDoc_jasaId_fkey" FOREIGN KEY ("jasaId") REFERENCES public."Jasa"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 I   ALTER TABLE ONLY public."JasaDoc" DROP CONSTRAINT "JasaDoc_jasaId_fkey";
       public          postgres    false    224    227    3724            �           2606    20039    JasaFaq JasaFaq_jasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaFaq"
    ADD CONSTRAINT "JasaFaq_jasaId_fkey" FOREIGN KEY ("jasaId") REFERENCES public."Jasa"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 I   ALTER TABLE ONLY public."JasaFaq" DROP CONSTRAINT "JasaFaq_jasaId_fkey";
       public          postgres    false    3724    224    228            �           2606    20054 3   JasaReviewDetail JasaReviewDetail_jasaReviewId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaReviewDetail"
    ADD CONSTRAINT "JasaReviewDetail_jasaReviewId_fkey" FOREIGN KEY ("jasaReviewId") REFERENCES public."JasaReview"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 a   ALTER TABLE ONLY public."JasaReviewDetail" DROP CONSTRAINT "JasaReviewDetail_jasaReviewId_fkey";
       public          postgres    false    3740    232    231            �           2606    20059 6   JasaReviewDetail JasaReviewDetail_msReviewPointId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaReviewDetail"
    ADD CONSTRAINT "JasaReviewDetail_msReviewPointId_fkey" FOREIGN KEY ("msReviewPointId") REFERENCES public."MsReviewPoint"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 d   ALTER TABLE ONLY public."JasaReviewDetail" DROP CONSTRAINT "JasaReviewDetail_msReviewPointId_fkey";
       public          postgres    false    232    256    3784            �           2606    20069 &   JasaReview JasaReview_orderJasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaReview"
    ADD CONSTRAINT "JasaReview_orderJasaId_fkey" FOREIGN KEY ("orderJasaId") REFERENCES public."OrderJasa"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 T   ALTER TABLE ONLY public."JasaReview" DROP CONSTRAINT "JasaReview_orderJasaId_fkey";
       public          postgres    false    236    231    3746            �           2606    20074 !   JasaReview JasaReview_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."JasaReview"
    ADD CONSTRAINT "JasaReview_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 O   ALTER TABLE ONLY public."JasaReview" DROP CONSTRAINT "JasaReview_userId_fkey";
       public          postgres    false    3870    231    297            }           2606    20079    Jasa Jasa_msKategoriId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Jasa"
    ADD CONSTRAINT "Jasa_msKategoriId_fkey" FOREIGN KEY ("msKategoriId") REFERENCES public."MsKategori"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 I   ALTER TABLE ONLY public."Jasa" DROP CONSTRAINT "Jasa_msKategoriId_fkey";
       public          postgres    false    243    224    3758            ~           2606    20084    Jasa Jasa_msStatusJasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Jasa"
    ADD CONSTRAINT "Jasa_msStatusJasaId_fkey" FOREIGN KEY ("msStatusJasaId") REFERENCES public."MsStatusJasa"(id) ON UPDATE CASCADE;
 K   ALTER TABLE ONLY public."Jasa" DROP CONSTRAINT "Jasa_msStatusJasaId_fkey";
       public          postgres    false    258    224    3788                       2606    20089    Jasa Jasa_msSubkategoriId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Jasa"
    ADD CONSTRAINT "Jasa_msSubkategoriId_fkey" FOREIGN KEY ("msSubkategoriId") REFERENCES public."MsSubkategori"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 L   ALTER TABLE ONLY public."Jasa" DROP CONSTRAINT "Jasa_msSubkategoriId_fkey";
       public          postgres    false    261    224    3794            �           2606    20094    Jasa Jasa_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Jasa"
    ADD CONSTRAINT "Jasa_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 C   ALTER TABLE ONLY public."Jasa" DROP CONSTRAINT "Jasa_userId_fkey";
       public          postgres    false    3870    297    224            �           2606    20099    MsKota MsKota_msProvinsiId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."MsKota"
    ADD CONSTRAINT "MsKota_msProvinsiId_fkey" FOREIGN KEY ("msProvinsiId") REFERENCES public."MsProvinsi"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 M   ALTER TABLE ONLY public."MsKota" DROP CONSTRAINT "MsKota_msProvinsiId_fkey";
       public          postgres    false    244    255    3782            �           2606    20104 ,   MsKurirLayanan MsKurirLayanan_msKurirId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."MsKurirLayanan"
    ADD CONSTRAINT "MsKurirLayanan_msKurirId_fkey" FOREIGN KEY ("msKurirId") REFERENCES public."MsKurir"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Z   ALTER TABLE ONLY public."MsKurirLayanan" DROP CONSTRAINT "MsKurirLayanan_msKurirId_fkey";
       public          postgres    false    3762    246    245            �           2606    20109 D   MsMerchantLevelBenefit MsMerchantLevelBenefit_msMerchantLevelId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."MsMerchantLevelBenefit"
    ADD CONSTRAINT "MsMerchantLevelBenefit_msMerchantLevelId_fkey" FOREIGN KEY ("msMerchantLevelId") REFERENCES public."MsMerchantLevel"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 r   ALTER TABLE ONLY public."MsMerchantLevelBenefit" DROP CONSTRAINT "MsMerchantLevelBenefit_msMerchantLevelId_fkey";
       public          postgres    false    3766    248    247            �           2606    20114 0   MsNotifikasi MsNotifikasi_msGroupNotifikasi_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."MsNotifikasi"
    ADD CONSTRAINT "MsNotifikasi_msGroupNotifikasi_fkey" FOREIGN KEY ("msGroupNotifikasi") REFERENCES public."MsNotifikasiGroup"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 ^   ALTER TABLE ONLY public."MsNotifikasi" DROP CONSTRAINT "MsNotifikasi_msGroupNotifikasi_fkey";
       public          postgres    false    3774    251    250            �           2606    20119 -   MsSubkategori MsSubkategori_msKategoriId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."MsSubkategori"
    ADD CONSTRAINT "MsSubkategori_msKategoriId_fkey" FOREIGN KEY ("msKategoriId") REFERENCES public."MsKategori"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 [   ALTER TABLE ONLY public."MsSubkategori" DROP CONSTRAINT "MsSubkategori_msKategoriId_fkey";
       public          postgres    false    243    261    3758            �           2606    20124 +   Notification Notification_senderUserId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Notification"
    ADD CONSTRAINT "Notification_senderUserId_fkey" FOREIGN KEY ("senderUserId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Y   ALTER TABLE ONLY public."Notification" DROP CONSTRAINT "Notification_senderUserId_fkey";
       public          postgres    false    297    263    3870            �           2606    20129 +   Notification Notification_targetUserId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Notification"
    ADD CONSTRAINT "Notification_targetUserId_fkey" FOREIGN KEY ("targetUserId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Y   ALTER TABLE ONLY public."Notification" DROP CONSTRAINT "Notification_targetUserId_fkey";
       public          postgres    false    3870    297    263            �           2606    20134 -   ObrolanContent ObrolanContent_oborolanId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."ObrolanContent"
    ADD CONSTRAINT "ObrolanContent_oborolanId_fkey" FOREIGN KEY ("obrolanId") REFERENCES public."Obrolan"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 [   ALTER TABLE ONLY public."ObrolanContent" DROP CONSTRAINT "ObrolanContent_oborolanId_fkey";
       public          postgres    false    265    264    3800            �           2606    20139 )   ObrolanContent ObrolanContent_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."ObrolanContent"
    ADD CONSTRAINT "ObrolanContent_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 W   ALTER TABLE ONLY public."ObrolanContent" DROP CONSTRAINT "ObrolanContent_userId_fkey";
       public          postgres    false    297    265    3870            �           2606    20144 0   OrderAktifitas OrderAktifitas_msAktifitasId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderAktifitas"
    ADD CONSTRAINT "OrderAktifitas_msAktifitasId_fkey" FOREIGN KEY ("msAktifitasId") REFERENCES public."MsAktifitas"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 ^   ALTER TABLE ONLY public."OrderAktifitas" DROP CONSTRAINT "OrderAktifitas_msAktifitasId_fkey";
       public          postgres    false    3748    267    238            �           2606    20149 *   OrderAktifitas OrderAktifitas_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderAktifitas"
    ADD CONSTRAINT "OrderAktifitas_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 X   ALTER TABLE ONLY public."OrderAktifitas" DROP CONSTRAINT "OrderAktifitas_orderId_fkey";
       public          postgres    false    3744    235    267            �           2606    20154    OrderFee OrderFee_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderFee"
    ADD CONSTRAINT "OrderFee_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 L   ALTER TABLE ONLY public."OrderFee" DROP CONSTRAINT "OrderFee_orderId_fkey";
       public          postgres    false    235    3744    268            �           2606    20159 ;   OrderHasilAttachment OrderHasilAttachment_orderHasilId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderHasilAttachment"
    ADD CONSTRAINT "OrderHasilAttachment_orderHasilId_fkey" FOREIGN KEY ("orderHasilId") REFERENCES public."OrderHasil"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 i   ALTER TABLE ONLY public."OrderHasilAttachment" DROP CONSTRAINT "OrderHasilAttachment_orderHasilId_fkey";
       public          postgres    false    3808    269    270            �           2606    20164 "   OrderHasil OrderHasil_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderHasil"
    ADD CONSTRAINT "OrderHasil_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 P   ALTER TABLE ONLY public."OrderHasil" DROP CONSTRAINT "OrderHasil_orderId_fkey";
       public          postgres    false    235    269    3744            �           2606    20169 #   OrderHasil OrderHasil_terminId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderHasil"
    ADD CONSTRAINT "OrderHasil_terminId_fkey" FOREIGN KEY ("terminId") REFERENCES public."OrderTermin"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public."OrderHasil" DROP CONSTRAINT "OrderHasil_terminId_fkey";
       public          postgres    false    3824    275    269            �           2606    20174 4   OrderJasaKepuasan OrderJasaKepuasan_orderJasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderJasaKepuasan"
    ADD CONSTRAINT "OrderJasaKepuasan_orderJasaId_fkey" FOREIGN KEY ("orderJasaId") REFERENCES public."OrderJasa"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 b   ALTER TABLE ONLY public."OrderJasaKepuasan" DROP CONSTRAINT "OrderJasaKepuasan_orderJasaId_fkey";
       public          postgres    false    3746    236    271            �           2606    20179 /   OrderJasaKepuasan OrderJasaKepuasan_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderJasaKepuasan"
    ADD CONSTRAINT "OrderJasaKepuasan_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 ]   ALTER TABLE ONLY public."OrderJasaKepuasan" DROP CONSTRAINT "OrderJasaKepuasan_userId_fkey";
       public          postgres    false    297    271    3870            �           2606    20189     OrderJasa OrderJasa_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderJasa"
    ADD CONSTRAINT "OrderJasa_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 N   ALTER TABLE ONLY public."OrderJasa" DROP CONSTRAINT "OrderJasa_orderId_fkey";
       public          postgres    false    236    235    3744            �           2606    20194 4   OrderPaymentHistory OrderPaymentHistory_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderPaymentHistory"
    ADD CONSTRAINT "OrderPaymentHistory_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 b   ALTER TABLE ONLY public."OrderPaymentHistory" DROP CONSTRAINT "OrderPaymentHistory_orderId_fkey";
       public          postgres    false    273    235    3744            �           2606    20199 &   OrderPayment OrderPayment_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderPayment"
    ADD CONSTRAINT "OrderPayment_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 T   ALTER TABLE ONLY public."OrderPayment" DROP CONSTRAINT "OrderPayment_orderId_fkey";
       public          postgres    false    272    235    3744            �           2606    20204 ,   OrderPayment OrderPayment_orderTerminId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderPayment"
    ADD CONSTRAINT "OrderPayment_orderTerminId_fkey" FOREIGN KEY ("orderTerminId") REFERENCES public."OrderTermin"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 Z   ALTER TABLE ONLY public."OrderPayment" DROP CONSTRAINT "OrderPayment_orderTerminId_fkey";
       public          postgres    false    272    275    3824            �           2606    20209 ,   OrderPengiriman OrderPengiriman_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderPengiriman"
    ADD CONSTRAINT "OrderPengiriman_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Z   ALTER TABLE ONLY public."OrderPengiriman" DROP CONSTRAINT "OrderPengiriman_orderId_fkey";
       public          postgres    false    274    235    3744            �           2606    20214 $   OrderTermin OrderTermin_orderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."OrderTermin"
    ADD CONSTRAINT "OrderTermin_orderId_fkey" FOREIGN KEY ("orderId") REFERENCES public."Order"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 R   ALTER TABLE ONLY public."OrderTermin" DROP CONSTRAINT "OrderTermin_orderId_fkey";
       public          postgres    false    275    235    3744            �           2606    20219    Order Order_msAktifitasId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Order"
    ADD CONSTRAINT "Order_msAktifitasId_fkey" FOREIGN KEY ("msAktifitasId") REFERENCES public."MsAktifitas"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 L   ALTER TABLE ONLY public."Order" DROP CONSTRAINT "Order_msAktifitasId_fkey";
       public          postgres    false    238    235    3748            �           2606    20224    Order Order_userIdPembeli_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Order"
    ADD CONSTRAINT "Order_userIdPembeli_fkey" FOREIGN KEY ("userIdPembeli") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 L   ALTER TABLE ONLY public."Order" DROP CONSTRAINT "Order_userIdPembeli_fkey";
       public          postgres    false    235    297    3870            �           2606    20229    Order Order_userIdPenjual_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Order"
    ADD CONSTRAINT "Order_userIdPenjual_fkey" FOREIGN KEY ("userIdPenjual") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 L   ALTER TABLE ONLY public."Order" DROP CONSTRAINT "Order_userIdPenjual_fkey";
       public          postgres    false    235    297    3870            �           2606    20234 !   Pencairan Pencairan_msBankId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Pencairan"
    ADD CONSTRAINT "Pencairan_msBankId_fkey" FOREIGN KEY ("msBankId") REFERENCES public."MsBank"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 O   ALTER TABLE ONLY public."Pencairan" DROP CONSTRAINT "Pencairan_msBankId_fkey";
       public          postgres    false    276    241    3754            �           2606    20239 !   Pencairan Pencairan_terminId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Pencairan"
    ADD CONSTRAINT "Pencairan_terminId_fkey" FOREIGN KEY ("terminId") REFERENCES public."OrderTermin"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 O   ALTER TABLE ONLY public."Pencairan" DROP CONSTRAINT "Pencairan_terminId_fkey";
       public          postgres    false    276    275    3824            �           2606    20244    Pencairan Pencairan_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Pencairan"
    ADD CONSTRAINT "Pencairan_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 M   ALTER TABLE ONLY public."Pencairan" DROP CONSTRAINT "Pencairan_userId_fkey";
       public          postgres    false    276    297    3870            �           2606    20249 =   PenjualPengaturanCatatan PenjualPengaturanCatatan_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanCatatan"
    ADD CONSTRAINT "PenjualPengaturanCatatan_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 k   ALTER TABLE ONLY public."PenjualPengaturanCatatan" DROP CONSTRAINT "PenjualPengaturanCatatan_userId_fkey";
       public          postgres    false    280    297    3870            �           2606    20254 E   PenjualPengaturanJadwalLibur PenjualPengaturanJadwalLibur_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanJadwalLibur"
    ADD CONSTRAINT "PenjualPengaturanJadwalLibur_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 s   ALTER TABLE ONLY public."PenjualPengaturanJadwalLibur" DROP CONSTRAINT "PenjualPengaturanJadwalLibur_userId_fkey";
       public          postgres    false    281    3870    297            �           2606    20259 Q   PenjualPengaturanJadwalOperasional PenjualPengaturanJadwalOperasional_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanJadwalOperasional"
    ADD CONSTRAINT "PenjualPengaturanJadwalOperasional_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
    ALTER TABLE ONLY public."PenjualPengaturanJadwalOperasional" DROP CONSTRAINT "PenjualPengaturanJadwalOperasional_userId_fkey";
       public          postgres    false    282    297    3870            �           2606    20264 R   PenjualPengaturanPengirimanDetail PenjualPengaturanPengirimanDetail_msKurirId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanPengirimanDetail"
    ADD CONSTRAINT "PenjualPengaturanPengirimanDetail_msKurirId_fkey" FOREIGN KEY ("msKurirId") REFERENCES public."MsKurir"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 �   ALTER TABLE ONLY public."PenjualPengaturanPengirimanDetail" DROP CONSTRAINT "PenjualPengaturanPengirimanDetail_msKurirId_fkey";
       public          postgres    false    284    245    3762            �           2606    20269 a   PenjualPengaturanPengirimanDetail PenjualPengaturanPengirimanDetail_penjualPengaturanPengiri_fkey    FK CONSTRAINT       ALTER TABLE ONLY public."PenjualPengaturanPengirimanDetail"
    ADD CONSTRAINT "PenjualPengaturanPengirimanDetail_penjualPengaturanPengiri_fkey" FOREIGN KEY ("penjualPengaturanPengirimanId") REFERENCES public."PenjualPengaturanPengiriman"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 �   ALTER TABLE ONLY public."PenjualPengaturanPengirimanDetail" DROP CONSTRAINT "PenjualPengaturanPengirimanDetail_penjualPengaturanPengiri_fkey";
       public          postgres    false    3839    284    283            �           2606    20274 E   PenjualPengaturanPengiriman PenjualPengaturanPengiriman_msKotaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanPengiriman"
    ADD CONSTRAINT "PenjualPengaturanPengiriman_msKotaId_fkey" FOREIGN KEY ("msKotaId") REFERENCES public."MsKota"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 s   ALTER TABLE ONLY public."PenjualPengaturanPengiriman" DROP CONSTRAINT "PenjualPengaturanPengiriman_msKotaId_fkey";
       public          postgres    false    244    283    3760            �           2606    20279 I   PenjualPengaturanPengiriman PenjualPengaturanPengiriman_msProvinsiId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanPengiriman"
    ADD CONSTRAINT "PenjualPengaturanPengiriman_msProvinsiId_fkey" FOREIGN KEY ("msProvinsiId") REFERENCES public."MsProvinsi"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 w   ALTER TABLE ONLY public."PenjualPengaturanPengiriman" DROP CONSTRAINT "PenjualPengaturanPengiriman_msProvinsiId_fkey";
       public          postgres    false    255    283    3782            �           2606    20284 I   PenjualPengaturanPengiriman PenjualPengaturanPengiriman_userAlamatId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanPengiriman"
    ADD CONSTRAINT "PenjualPengaturanPengiriman_userAlamatId_fkey" FOREIGN KEY ("userAlamatId") REFERENCES public."UserAlamat"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 w   ALTER TABLE ONLY public."PenjualPengaturanPengiriman" DROP CONSTRAINT "PenjualPengaturanPengiriman_userAlamatId_fkey";
       public          postgres    false    3872    298    283            �           2606    20289 C   PenjualPengaturanPengiriman PenjualPengaturanPengiriman_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanPengiriman"
    ADD CONSTRAINT "PenjualPengaturanPengiriman_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 q   ALTER TABLE ONLY public."PenjualPengaturanPengiriman" DROP CONSTRAINT "PenjualPengaturanPengiriman_userId_fkey";
       public          postgres    false    3870    283    297            �           2606    20299 K   PenjualPengaturanProdukUnggulan PenjualPengaturanProdukUnggulan_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanProdukUnggulan"
    ADD CONSTRAINT "PenjualPengaturanProdukUnggulan_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 y   ALTER TABLE ONLY public."PenjualPengaturanProdukUnggulan" DROP CONSTRAINT "PenjualPengaturanProdukUnggulan_userId_fkey";
       public          postgres    false    285    297    3870            �           2606    20304 M   PenjualPengaturanTemplateBalasan PenjualPengaturanTemplateBalasan_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualPengaturanTemplateBalasan"
    ADD CONSTRAINT "PenjualPengaturanTemplateBalasan_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 {   ALTER TABLE ONLY public."PenjualPengaturanTemplateBalasan" DROP CONSTRAINT "PenjualPengaturanTemplateBalasan_userId_fkey";
       public          postgres    false    297    3870    286            �           2606    20309 %   PenjualScore PenjualScore_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."PenjualScore"
    ADD CONSTRAINT "PenjualScore_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 S   ALTER TABLE ONLY public."PenjualScore" DROP CONSTRAINT "PenjualScore_userId_fkey";
       public          postgres    false    3870    297    287            �           2606    20314 *   Portofolio Portofolio_tenderPesertaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Portofolio"
    ADD CONSTRAINT "Portofolio_tenderPesertaId_fkey" FOREIGN KEY ("tenderPesertaId") REFERENCES public."TenderPeserta"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 X   ALTER TABLE ONLY public."Portofolio" DROP CONSTRAINT "Portofolio_tenderPesertaId_fkey";
       public          postgres    false    296    288    3866            �           2606    20319 2   ProgresPeserta ProgresPeserta_tenderPesertaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."ProgresPeserta"
    ADD CONSTRAINT "ProgresPeserta_tenderPesertaId_fkey" FOREIGN KEY ("tenderPesertaId") REFERENCES public."TenderPeserta"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 `   ALTER TABLE ONLY public."ProgresPeserta" DROP CONSTRAINT "ProgresPeserta_tenderPesertaId_fkey";
       public          postgres    false    296    289    3866            �           2606    20324 )   ProgresPeserta ProgresPeserta_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."ProgresPeserta"
    ADD CONSTRAINT "ProgresPeserta_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 W   ALTER TABLE ONLY public."ProgresPeserta" DROP CONSTRAINT "ProgresPeserta_userId_fkey";
       public          postgres    false    297    289    3870            �           2606    20329 "   Resume Resume_tenderPesertaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Resume"
    ADD CONSTRAINT "Resume_tenderPesertaId_fkey" FOREIGN KEY ("tenderPesertaId") REFERENCES public."TenderPeserta"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 P   ALTER TABLE ONLY public."Resume" DROP CONSTRAINT "Resume_tenderPesertaId_fkey";
       public          postgres    false    3866    296    291            �           2606    20334    Saldo Saldo_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Saldo"
    ADD CONSTRAINT "Saldo_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 E   ALTER TABLE ONLY public."Saldo" DROP CONSTRAINT "Saldo_userId_fkey";
       public          postgres    false    297    3870    277            �           2606    20339    Session Session_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Session"
    ADD CONSTRAINT "Session_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE CASCADE;
 I   ALTER TABLE ONLY public."Session" DROP CONSTRAINT "Session_userId_fkey";
       public          postgres    false    3870    292    297            �           2606    20344 -   TenderAktifitas TenderAktifitas_tenderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderAktifitas"
    ADD CONSTRAINT "TenderAktifitas_tenderId_fkey" FOREIGN KEY ("tenderId") REFERENCES public."Tender"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 [   ALTER TABLE ONLY public."TenderAktifitas" DROP CONSTRAINT "TenderAktifitas_tenderId_fkey";
       public          postgres    false    294    293    3859            �           2606    20349 4   TenderAktifitas TenderAktifitas_tenderPesertaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderAktifitas"
    ADD CONSTRAINT "TenderAktifitas_tenderPesertaId_fkey" FOREIGN KEY ("tenderPesertaId") REFERENCES public."TenderPeserta"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 b   ALTER TABLE ONLY public."TenderAktifitas" DROP CONSTRAINT "TenderAktifitas_tenderPesertaId_fkey";
       public          postgres    false    3866    296    294            �           2606    20354 +   TenderAktifitas TenderAktifitas_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderAktifitas"
    ADD CONSTRAINT "TenderAktifitas_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Y   ALTER TABLE ONLY public."TenderAktifitas" DROP CONSTRAINT "TenderAktifitas_userId_fkey";
       public          postgres    false    3870    297    294            �           2606    20359 0   TenderKontrak TenderKontrak_tenderPesertaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderKontrak"
    ADD CONSTRAINT "TenderKontrak_tenderPesertaId_fkey" FOREIGN KEY ("tenderPesertaId") REFERENCES public."TenderPeserta"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 ^   ALTER TABLE ONLY public."TenderKontrak" DROP CONSTRAINT "TenderKontrak_tenderPesertaId_fkey";
       public          postgres    false    3866    296    295            �           2606    20364 '   TenderKontrak TenderKontrak_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderKontrak"
    ADD CONSTRAINT "TenderKontrak_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 U   ALTER TABLE ONLY public."TenderKontrak" DROP CONSTRAINT "TenderKontrak_userId_fkey";
       public          postgres    false    297    3870    295            �           2606    20369 ;   TenderPeserta TenderPeserta_msAlasanPembatalanTenderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderPeserta"
    ADD CONSTRAINT "TenderPeserta_msAlasanPembatalanTenderId_fkey" FOREIGN KEY ("msAlasanPembatalanTenderId") REFERENCES public."MsAlasanPembatalanTender"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 i   ALTER TABLE ONLY public."TenderPeserta" DROP CONSTRAINT "TenderPeserta_msAlasanPembatalanTenderId_fkey";
       public          postgres    false    296    239    3750            �           2606    20374 )   TenderPeserta TenderPeserta_tenderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderPeserta"
    ADD CONSTRAINT "TenderPeserta_tenderId_fkey" FOREIGN KEY ("tenderId") REFERENCES public."Tender"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 W   ALTER TABLE ONLY public."TenderPeserta" DROP CONSTRAINT "TenderPeserta_tenderId_fkey";
       public          postgres    false    296    293    3859            �           2606    20379 '   TenderPeserta TenderPeserta_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."TenderPeserta"
    ADD CONSTRAINT "TenderPeserta_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 U   ALTER TABLE ONLY public."TenderPeserta" DROP CONSTRAINT "TenderPeserta_userId_fkey";
       public          postgres    false    3870    296    297            �           2606    20384 $   Tender Tender_msMerchantLevelId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Tender"
    ADD CONSTRAINT "Tender_msMerchantLevelId_fkey" FOREIGN KEY ("msMerchantLevelId") REFERENCES public."MsMerchantLevel"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 R   ALTER TABLE ONLY public."Tender" DROP CONSTRAINT "Tender_msMerchantLevelId_fkey";
       public          postgres    false    247    3766    293            �           2606    20389 $   Tender Tender_msPostingTenderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Tender"
    ADD CONSTRAINT "Tender_msPostingTenderId_fkey" FOREIGN KEY ("msPostingTenderId") REFERENCES public."MsPostingTender"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 R   ALTER TABLE ONLY public."Tender" DROP CONSTRAINT "Tender_msPostingTenderId_fkey";
       public          postgres    false    293    254    3780            �           2606    20394 #   Tender Tender_msStatusTenderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Tender"
    ADD CONSTRAINT "Tender_msStatusTenderId_fkey" FOREIGN KEY ("msStatusTenderId") REFERENCES public."MsStatusTender"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 Q   ALTER TABLE ONLY public."Tender" DROP CONSTRAINT "Tender_msStatusTenderId_fkey";
       public          postgres    false    3792    293    260            �           2606    20399    Tender Tender_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."Tender"
    ADD CONSTRAINT "Tender_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 G   ALTER TABLE ONLY public."Tender" DROP CONSTRAINT "Tender_userId_fkey";
       public          postgres    false    293    297    3870            �           2606    20404 #   UserAlamat UserAlamat_msKotaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserAlamat"
    ADD CONSTRAINT "UserAlamat_msKotaId_fkey" FOREIGN KEY ("msKotaId") REFERENCES public."MsKota"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 Q   ALTER TABLE ONLY public."UserAlamat" DROP CONSTRAINT "UserAlamat_msKotaId_fkey";
       public          postgres    false    244    3760    298            �           2606    20409 '   UserAlamat UserAlamat_msProvinsiId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserAlamat"
    ADD CONSTRAINT "UserAlamat_msProvinsiId_fkey" FOREIGN KEY ("msProvinsiId") REFERENCES public."MsProvinsi"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 U   ALTER TABLE ONLY public."UserAlamat" DROP CONSTRAINT "UserAlamat_msProvinsiId_fkey";
       public          postgres    false    298    3782    255            �           2606    20414 !   UserAlamat UserAlamat_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserAlamat"
    ADD CONSTRAINT "UserAlamat_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 O   ALTER TABLE ONLY public."UserAlamat" DROP CONSTRAINT "UserAlamat_userId_fkey";
       public          postgres    false    3870    298    297            �           2606    20419 %   UserBahasa UserBahasa_msBahasaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserBahasa"
    ADD CONSTRAINT "UserBahasa_msBahasaId_fkey" FOREIGN KEY ("msBahasaId") REFERENCES public."MsBahasa"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 S   ALTER TABLE ONLY public."UserBahasa" DROP CONSTRAINT "UserBahasa_msBahasaId_fkey";
       public          postgres    false    3752    299    240            �           2606    20424 !   UserBahasa UserBahasa_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserBahasa"
    ADD CONSTRAINT "UserBahasa_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 O   ALTER TABLE ONLY public."UserBahasa" DROP CONSTRAINT "UserBahasa_userId_fkey";
       public          postgres    false    3870    299    297            �           2606    20429 '   UserEdukasi UserEdukasi_msNegaraId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserEdukasi"
    ADD CONSTRAINT "UserEdukasi_msNegaraId_fkey" FOREIGN KEY ("msNegaraId") REFERENCES public."MsNegara"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 U   ALTER TABLE ONLY public."UserEdukasi" DROP CONSTRAINT "UserEdukasi_msNegaraId_fkey";
       public          postgres    false    3770    249    300            �           2606    20434 /   UserEdukasi UserEdukasi_msTingkatEdukasiId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserEdukasi"
    ADD CONSTRAINT "UserEdukasi_msTingkatEdukasiId_fkey" FOREIGN KEY ("msTingkatEdukasiId") REFERENCES public."MsTingkatEdukasi"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 ]   ALTER TABLE ONLY public."UserEdukasi" DROP CONSTRAINT "UserEdukasi_msTingkatEdukasiId_fkey";
       public          postgres    false    3796    300    262            �           2606    20439 #   UserEdukasi UserEdukasi_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserEdukasi"
    ADD CONSTRAINT "UserEdukasi_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 Q   ALTER TABLE ONLY public."UserEdukasi" DROP CONSTRAINT "UserEdukasi_userId_fkey";
       public          postgres    false    3870    297    300            �           2606    20444 0   UserFollowing UserFollowing_followingUserId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserFollowing"
    ADD CONSTRAINT "UserFollowing_followingUserId_fkey" FOREIGN KEY ("followingUserId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 ^   ALTER TABLE ONLY public."UserFollowing" DROP CONSTRAINT "UserFollowing_followingUserId_fkey";
       public          postgres    false    301    3870    297            �           2606    20449 '   UserFollowing UserFollowing_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserFollowing"
    ADD CONSTRAINT "UserFollowing_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 U   ALTER TABLE ONLY public."UserFollowing" DROP CONSTRAINT "UserFollowing_userId_fkey";
       public          postgres    false    3870    297    301            �           2606    20454 1   UserForgetPassword UserForgetPassword_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserForgetPassword"
    ADD CONSTRAINT "UserForgetPassword_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 _   ALTER TABLE ONLY public."UserForgetPassword" DROP CONSTRAINT "UserForgetPassword_userId_fkey";
       public          postgres    false    303    3870    297            �           2606    20459 %   UserKeahlian UserKeahlian_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserKeahlian"
    ADD CONSTRAINT "UserKeahlian_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 S   ALTER TABLE ONLY public."UserKeahlian" DROP CONSTRAINT "UserKeahlian_userId_fkey";
       public          postgres    false    297    304    3870            �           2606    20464 (   UserKepuasan UserKepuasan_createdBy_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserKepuasan"
    ADD CONSTRAINT "UserKepuasan_createdBy_fkey" FOREIGN KEY ("createdBy") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 V   ALTER TABLE ONLY public."UserKepuasan" DROP CONSTRAINT "UserKepuasan_createdBy_fkey";
       public          postgres    false    3870    305    297            �           2606    20469 %   UserKepuasan UserKepuasan_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserKepuasan"
    ADD CONSTRAINT "UserKepuasan_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 S   ALTER TABLE ONLY public."UserKepuasan" DROP CONSTRAINT "UserKepuasan_userId_fkey";
       public          postgres    false    3870    305    297            �           2606    20474 1   UserNotifikasi UserNotifikasi_msNotifikasiId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserNotifikasi"
    ADD CONSTRAINT "UserNotifikasi_msNotifikasiId_fkey" FOREIGN KEY ("msNotifikasiId") REFERENCES public."MsNotifikasi"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 _   ALTER TABLE ONLY public."UserNotifikasi" DROP CONSTRAINT "UserNotifikasi_msNotifikasiId_fkey";
       public          postgres    false    306    250    3772            �           2606    20479 )   UserNotifikasi UserNotifikasi_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserNotifikasi"
    ADD CONSTRAINT "UserNotifikasi_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 W   ALTER TABLE ONLY public."UserNotifikasi" DROP CONSTRAINT "UserNotifikasi_userId_fkey";
       public          postgres    false    297    306    3870            �           2606    20484 '   UserRekening UserRekening_msBankId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserRekening"
    ADD CONSTRAINT "UserRekening_msBankId_fkey" FOREIGN KEY ("msBankId") REFERENCES public."MsBank"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 U   ALTER TABLE ONLY public."UserRekening" DROP CONSTRAINT "UserRekening_msBankId_fkey";
       public          postgres    false    3754    307    241            �           2606    20489 %   UserRekening UserRekening_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserRekening"
    ADD CONSTRAINT "UserRekening_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 S   ALTER TABLE ONLY public."UserRekening" DROP CONSTRAINT "UserRekening_userId_fkey";
       public          postgres    false    297    3870    307            �           2606    20494 )   UserSertifikat UserSertifikat_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserSertifikat"
    ADD CONSTRAINT "UserSertifikat_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 W   ALTER TABLE ONLY public."UserSertifikat" DROP CONSTRAINT "UserSertifikat_userId_fkey";
       public          postgres    false    297    308    3870            �           2606    20499 1   UserTenderFavorit UserTenderFavorit_tenderId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserTenderFavorit"
    ADD CONSTRAINT "UserTenderFavorit_tenderId_fkey" FOREIGN KEY ("tenderId") REFERENCES public."Tender"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 _   ALTER TABLE ONLY public."UserTenderFavorit" DROP CONSTRAINT "UserTenderFavorit_tenderId_fkey";
       public          postgres    false    293    309    3859            �           2606    20504 /   UserTenderFavorit UserTenderFavorit_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserTenderFavorit"
    ADD CONSTRAINT "UserTenderFavorit_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 ]   ALTER TABLE ONLY public."UserTenderFavorit" DROP CONSTRAINT "UserTenderFavorit_userId_fkey";
       public          postgres    false    309    3870    297            �           2606    20509 !   UserVaOpen UserVaOpen_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserVaOpen"
    ADD CONSTRAINT "UserVaOpen_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 O   ALTER TABLE ONLY public."UserVaOpen" DROP CONSTRAINT "UserVaOpen_userId_fkey";
       public          postgres    false    3870    310    297            �           2606    20514 -   UserVerification UserVerification_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserVerification"
    ADD CONSTRAINT "UserVerification_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 [   ALTER TABLE ONLY public."UserVerification" DROP CONSTRAINT "UserVerification_userId_fkey";
       public          postgres    false    3870    297    311            �           2606    20524 '   UserWhistlist UserWhistlist_userId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."UserWhistlist"
    ADD CONSTRAINT "UserWhistlist_userId_fkey" FOREIGN KEY ("userId") REFERENCES public."User"(id) ON UPDATE CASCADE ON DELETE RESTRICT;
 U   ALTER TABLE ONLY public."UserWhistlist" DROP CONSTRAINT "UserWhistlist_userId_fkey";
       public          postgres    false    297    312    3870            �           2606    20529    User User_msKotaId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."User"
    ADD CONSTRAINT "User_msKotaId_fkey" FOREIGN KEY ("msKotaId") REFERENCES public."MsKota"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 E   ALTER TABLE ONLY public."User" DROP CONSTRAINT "User_msKotaId_fkey";
       public          postgres    false    297    244    3760            �           2606    20534     User User_msMerchantLevelId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."User"
    ADD CONSTRAINT "User_msMerchantLevelId_fkey" FOREIGN KEY ("msMerchantLevelId") REFERENCES public."MsMerchantLevel"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 N   ALTER TABLE ONLY public."User" DROP CONSTRAINT "User_msMerchantLevelId_fkey";
       public          postgres    false    247    297    3766            �           2606    20539    User User_msProvinsiId_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."User"
    ADD CONSTRAINT "User_msProvinsiId_fkey" FOREIGN KEY ("msProvinsiId") REFERENCES public."MsProvinsi"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 I   ALTER TABLE ONLY public."User" DROP CONSTRAINT "User_msProvinsiId_fkey";
       public          postgres    false    3782    297    255            �           2606    20544    User User_sellerStatus_fkey    FK CONSTRAINT     �   ALTER TABLE ONLY public."User"
    ADD CONSTRAINT "User_sellerStatus_fkey" FOREIGN KEY ("sellerStatus") REFERENCES public."MsStatusSeller"(id) ON UPDATE CASCADE ON DELETE SET NULL;
 I   ALTER TABLE ONLY public."User" DROP CONSTRAINT "User_sellerStatus_fkey";
       public          postgres    false    297    259    3790            �           2606    20594 A   model_has_permissions model_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.model_has_permissions
    ADD CONSTRAINT model_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;
 k   ALTER TABLE ONLY public.model_has_permissions DROP CONSTRAINT model_has_permissions_permission_id_foreign;
       public          postgres    false    319    316    3905            �           2606    20605 /   model_has_roles model_has_roles_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.model_has_roles
    ADD CONSTRAINT model_has_roles_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 Y   ALTER TABLE ONLY public.model_has_roles DROP CONSTRAINT model_has_roles_role_id_foreign;
       public          postgres    false    3909    320    318            �           2606    20615 ?   role_has_permissions role_has_permissions_permission_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_permission_id_foreign FOREIGN KEY (permission_id) REFERENCES public.permissions(id) ON DELETE CASCADE;
 i   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_permission_id_foreign;
       public          postgres    false    3905    321    316            �           2606    20620 9   role_has_permissions role_has_permissions_role_id_foreign    FK CONSTRAINT     �   ALTER TABLE ONLY public.role_has_permissions
    ADD CONSTRAINT role_has_permissions_role_id_foreign FOREIGN KEY (role_id) REFERENCES public.roles(id) ON DELETE CASCADE;
 c   ALTER TABLE ONLY public.role_has_permissions DROP CONSTRAINT role_has_permissions_role_id_foreign;
       public          postgres    false    321    318    3909            �      x������ � �      �      x������ � �      �   �   x�U��� E�����t�b�t�%(��2�/87�!��szia��
A�;��'y�p���Q0R�x���	���+���#�1X.��+u9�˵:=��<=8���uƻO@��2��/x�}��,x�^pئ� ~$�dKR���b��ԇl����Q�"��!�w+֏{,l��Vw��g<���_ tz�+�Β���y_U��dy�      �      x������ � �      �   7   x�3�t,(����OI�)��	-N-�4�2�"j�e�EԘ���	�!QS�=... i�$      �      x������ � �      �   �   x����
�0���+��H6i+�(�yo�lh��B!1��KŃE{�xC�8v����,���ȫG|^(�)h��$-U�!jiך�W&4Nх���s2�d�ӻ�Zj��#��v.L[��w��_��K�P��5����c�����l�B� ��r�      �      x������ � �      �   $   x�3�4�2bc 6bS 6�4bc 6����� S�a      �   P   x�3�LL����,.)J,�/�,OM�4202�54�50S04�24�26�&�eę������J�.cΌ��t�p&��!F��� ��/      �   x  x���K��@�u�+\�U�xt�6ڀ���M�g�U�K�_��$v:�٘����w.8�����pST`�w'
�8zv�4{�5Z?v'n�.q�&�]�X~nCTȍ!nv��je����"�C^�"4E�����C}�CF<�	�,��tr�:����t`h�A���W��qw�F&/rt����3�	�&�v>�j^��V�S}7}{\E֦j����W�#�)�y�q�URNG�L���m羮��K�����t[�KlY4�}W�N�Ze�<�����t��B4ju����ѕ}����K��U �'|xSV�P��n�t:���f����d��sc��u��"��;"9
���#fMq'��S8#�D�R���_��h�,��      �      x��}yw��������N�`�/��M�-�؎/��F9��&��d3�M-��w�����M�dKdW�� ��+�d�$	N3"C��ǉ�\S`�&a�b�QI���`a���e������W��H�W���0��R�g�ϟ���?<:����;{::|��<:,��R��� ���}���(�׃'i���^,��~�7>`�m��i�/`�K��G������E::̽~��у���Cx:8+��x�����i�= �p���y��{� ��ˏ?����/{1�����A�~��P�u|~r�/����E\���_�cڱ$��4�hh�A{)�E���`4>�������}�5�蓿����\�	��=`�d��
 ȁH�)�"S���(��J1�����0!d��g{�a�;��[�=�w��k��Y���WpHb.F��ā�By��������;1�hT耛c��Ҹ����ǿ/�4��i|2(C��'��G���p�����e�?�7����-.�	9�,�;������5��"}�$���~n&_q=��q4�N-X�YJ���y*w �$2�4�<����������Czg�.��L����r;^��|9�w���uL>�;c�bt��N����8x��op>��������}������/�����?��l�ۃ�N�s�?~Ϙk��B�ao�X���y��8�,�w2>�!��{�a'���\�ϗW��������Nq x����N������ӣ��/�k���j�{z�"I/�	�=Mx�Ћ�a��a�(m��������_YE^�ёtE��W<�w��� �܇qZ���k/���"���=Jg���I�B<�&?|�ͧ仯>��/���rN������~����F~��N~hN>U��?��y�~�"���OF�8��+����ţ�~�hh��?}�T�>�]��g�O�Ͽ�׳>�88?6�͟���+�7����2v��G��Q��o���}�Oz_�]���W�_��_���U q*�'_P��	�Hş��ݳ����=��B�N͓�az�\4\u1�_�<�=A�y���Q��yv�2eiFq��H�2	�î+�<�����O>��O>��ɷ�=���'?��Q�ӛE胳�~���I�Q���
���H~)4;: �?�a\fEP�����~��J�������L�w��D"I͊=_���+(9��(/�Q1b�r$�3��G����H]��@x�L��^z�Z`ډ"v�g�>��I�?��\Cj�xydT�6����Q�N�y�1L0���A3��w�����
���-�#Ѓa�U����x2�lCf:�\CcoLn}<�S���������y�Ӭ����sTT�J�H�8�1�0AZ-�ʨ����b<:>��ы��19��@i�0�v��w5]��%f�I21q�C�ru^��VLF�VX�z�2��S����6��N�ޔ��M�NFa�;��i��w-[�%RIOl*��צ�V��6R�&�K����)ƌf�F��J��6.����~�VҚX�V(̹1��s�η�fwm���[yX�kչV�k�W��Dlĵڎ[�)�ݢ��:\)@��;�K�J	)�t��IsMhւH�")b�g�Q60)�F,{�J�s�l$#.���<�Ηژ�X5�ҡ��Z�Y.-I)P�PӂY�Ι�l�=�+Dψ���+�w��̅�>l�7�:D��}���ƥ�XO�ᕈ��EkCԹS��KVH�����`�]Q1�ീ�&*c��>��3�I1e2~���dd�����*CU��n�� �a�Z�T4L-I��Q�������09[J����C���<.�ǻCӧ X�]��8�"��AP,2t��Fp���D���6PR"pE�H�XA�(K' �Q�"��p5 B%E⼦Iwhm-��B��N
e�7�x�-ѳ�(&�b���7uᦻ7��7uᦶ�7e4s��(��
E����P��Y���nM�4P^F���%+�_�d�hETQ^�Е���p�����z{���ƞ��L��,Y�q�#Z��h��u�������&[����,G`C�k#�Y�A��hi4~���}{ES���4��6Z[V����z]%�JpEwӻ��2'����VJGpY{g2h���d,P�tz�4�Z�Ғ��&^�l��H�U-z��3��(5��X�2��8Fk�V^[I���m��7'ꖎ������Ư�}�]�"u�O����6�Rnrᝃof�����
9���2��XL�@�{���Y0٘E�j�4���'���4��-�NؗW�uY3�fRt�k/�7a90�-_�I�!�ܒ�#(k]Y(S�8���k'<�����ܒ���j�2Z~2G�R�+�}!r�>�un�Ƒ�(\�la�%���SJ�n��Mn�5Aso3�B*TF�0Q+Ŝ7,���`�k-�(v�I��Y�lɯ����sK:��sK:�d�n��t��nb��"�5O|�8fP*���y�Ĕ�-Y?wM�·A-Z��3�]u�Ք�,�Z4�\9"��3`$)�].)�'�b�#H�Ԅa{�9�7�S��HW��|��hD�E�
��P�&�lAH�q�vC�z��L�d�+S[g�m-��W�y�DƠ�˙����Zٜ<m��M�.��$X.�D)~��ysQ�U,>!�ާ��O<0���=w�;u-z��������9��@�ʇ���i����8﬿��_gju��ݛZ����2O-�Vv��)�"¼�����U���2@{�9��MQ
&�Ĺ��t��v�\<"Q&˸$^��U�Z�X�.�u+�Q�ŨeHj�v1	Aǵ�"�A��hY�>=c���?)��˵�����#W����N��j�����p-���p`��4��t`hPd�T��ޮ_�������P�ea-�y�٠j�l��u�?�G�!�׿��3��;Ϡ�:�`�=��g ���QesRJ���(Β�A���6�����6�Y�3M΢�B�lE��j��/��RZ�{K"��V�RBpu�:�`��A(�A���/J#��6��g��*'ۄ��6䌞xr(!��<
%_��3�8r��l r(qN:��q����-��1eݠj4`�Aj0h8P^bh�O9�*�c��-�_e6� w��>H�Y�[�~� '�F��=4ȫϝS�9�S��N���%��$�G2-W*Ye˦-C�Q����E#o�"��@lR�&�6��(휂-�:��Smu�}��lD� � YP�4U#�K�3 qYSB��!�r�o������Ԍw�(Niΐ�J*�L�(�8{O��¼D]�D"�)Wv喺���OӚ�:�f�(m�`@���ɂp��"dkL^�Χ�Z�B+p]�OchY��|򁇵��|�M#�h�d~����h"4f4]�'j��⛷�6��L=����eM�oB{�{_ MS��xk%q4s��B�[�~�揣����E*����f:o��f�ۛN��͠����'x_j��h�@R���2�r�Ȼ��� �j ��R\[C���~�B��x��!�t���`�����h2��&� ձ,''l��ז�[:P��!�T�ȅ�r��kp)I��f�� ���ʼ�D��e}�H�8�>PT^���HKg����;S2�Q]-ET�NJ�9�g���X�3IX�#0�2Ψ�
r�����U%YA�����P 1%���E�ۨw��P].���W�n�
b��/f_��J��"yq,��ic.7�u�#�����
�S��R�B�����𔠮h삆1��^9��0�����+�X3�Z��5j㜎F/�"5~7�S^��ob5#�����qo�o��"���k����/zϞQu��w^�"��K�Q��-�K�G'��_��^�ǃ�k�[����g�����B��|������"�?�+�����#��ѕG0��}e�����^#8��_�J�G�G�G���u~��uU��Um�2��?�P��.6�ځ    OCt:z}�pT4�@sv�`Q.	Ji����i���9O7T6�,�0�N�O	mz�s��w��J��Q��]�Z��8h��2�~�W�O��2�M��\��W���dV.�<y��]k�5��2����y}ab��W�?���4�\(u��Ď���؜Km��/�.L��ѥǖ'x~����zƋ!�Ҍ��V=?���&<3�{�[ӛ��9�b�\~)�p��A~��5;yƬ�1�88AK���ɥ�^ �<E&kXi[��Κ�v�su����j�I֝���M�)������O��3�>3"ib��R.(�q"�Y4R"�����)�����,���jz�������0��X�˹#ڬ?���npZ
�p9���ʹc�,��̢�Y�y���+d*!L<s ��t$�Q�h�N:�[�tg���(B��eϵ�$Fge	U����[�dy]���ف
oZkZ�Ϧ��+`3���{���E�u����H@�DjG��Sɤ�tX�fg��F�~��1/N�-�]<W6�̟�0^cM+��D%a�' Hd:
�j5�2ƣ)������幄�b����lQ8U�1�<0����?E�~~4Ac�w� ?����L�M��(��\+��/vS��9uh�t��UP�5�Ep˄&�˜��&�22'�Fu��D��G��Y�Q�8��bo
�x��sA5��ϰ-�|�$%� dkc�-�tNEc��\�c�iQQ�,E����h#���0!%�צR?��ZQhy���U䎬Eb��9ԑֹ��d��Ft<8��N�L�P]�J��Μt�H)�J��"'PP��]�Qg�%��g:\W���)[�$a��	ȭM�ߠeHm�Ƈ?>���������yr�'��p�J������Iu�5O�߯yxq��o.�\��ٝY�k��Agbx�Ӡwv��Ζ�_��n3�y��V�kӴ�ی���������9y��Q���F����h?~��H�/�g�?~h�F�#�-�^�S��2��Ɇ{O�LK�;��;�E�����)	m������cw��Z��DI���ՖD�ܺȂ��}�������ix�kV�!�f�O�5�֝�:<D��p�Pvo�*ݎ���|>&Rgι�7.�o�y�o.��0��\f�=^znʪW_zIT��E�`xx�T�ˋ�Nw��Vm<�����0����2���2�:� �fe�N,��%�\���o�����t��!�2�a#�$�R��R�M�U�q����_��T�:6��	 ��;�g�X@��MK�5�-��=aXS�0��D���gT��<S�QOM�U�5�����'�~m��$Zٜef�a8IRh��;�_�hg���-�3�p��Ĕ^��@�U`B&j9MZl�xD
�¹��}I�jb��Ax��t��J'��(��;*�+�E�]I4d $Z�m
���ὓü�V���Ux[
(�F%�Ʋ.r��ƣo����䰒����RfUº�8�<Iɖ����;9,:9|;
�b�R�R�:�	Ĕ�Ɲs�[�h:9�=9l��)���kJB��b�(������d�/�1�s�T#QR��+�>tW�i��b�{���TnS�#8 	M)�9��&7�Ӥ�Ѥ��&ݱ��MZ��ҩX�?5�"H�St����i��Ф�GS�%��m�L<��N��dZJ(vrx��j+�w;�9l+w\�X�aGw<s�{���i��N����leN��VA�Z��MG�!0ޠ�-TƬlg?^��d7r��-�]<֡�
���\ 7�J@�">�ޛL��Y︋*��o@��ɣ�$�qG�1C��ԣc�iM���e\Q��e�FNI�6Y�lw6����h��j�Bq��o��	Ǒ$KI� ��jSRl���ͥ@�PL��V��f;��;:�d���[�rXWҫ+�RI��@����O�����}��/�1��W��	>������o>������Ep�O�M��yi������^_	�SZ������ĕ܇�J
�<U�(�����S������5b�_�
�ڪ �v�9�����K�W���:b���;N�E����H�^���q�Z��s6w�Pl%�luQ9�H*m�ؐ�D��<Gie��%��#h�E4�Ț�TL���t�\��`w��Fв5ZƗ\NlԲ�^p�(�6Z�AG�U�ؒ+�#>�yd
o�Jk��Mn�ִ��r��t��YT�E�Y�BI��-s�9Zu�[V�R�����1FM>΋�ߦ���t�q���Eoc�g2���d@q�*5��Y��� 2�F���� a�L�β_[_�J��T���"��Ƨ(�p��N�,��#W�� Z�z�E�D� ��,�k�����D���^H!���ߵ�oZc����G�h�ޫ�51�z�BG�D�ޯci��`\
Ɵ׿��34:s�37:sc�q�U�#e��4��,<�.���b�1B��FR*�ʉ��e�"�Qۙ�QZU`#�mx��@�5�o��T��,V��$n�ʢ�Z��9���������F�$n-FiWB�m&�4�$(�Y�h�Ŵ6\�}�y�X���%�_���y$ ��Q�t�n2�e� �)�X�:&����pIA�,�*>����e��X[R�9dK��QC��c�b"/�������]���۷�Qj�i�3:791U�T���F��pe��!�E#5+��˙�
���Z�.��m�(b$+����J�W؎
��T���u���!T5��3g-q**��\��]kCؙ���KWp����e�%O�V\�@.D�6\�i�y�L��)��8�M{G8E5n(Z�1����,�;M!:��H��QF-c��1��<���ꙋESM�F#_IsT��[t��������E*���^x�%t�}g��²/�W��I�B� C����I�A1)�Ahsh���X.$1L�LMt@���������s`�i^�	qʌ�Z��W�ۀ�څ̂�N�8�E�4��O�\�rZ�P�%k������!�'�zc��P��j�v[����M���؜�B�D�}�� �& �*�9p�z�[g�@'�ഥ❰��(1*a��oB���w�q�&�o�Pr΃h��r3p����kʁ����=*f�iI��@��I��Y9�S1З&^H h���3�0:���a��Zz�5q�P�"�9FG�EJ ;E�<�h.tJ���'�q~қ;��-�*���4���#� �gF��.�㧷�����In�̊{�O�bY�^*�2�LA=D�?ݘKo��e���AkSe�/琮��Uϔ�DFc�w�C�ު�ul����TJ٦a�q��'����}o��0�_���~�>��V㏲�=�ū�ʸ˽�wF	��|��?^��m��ɬIC�7}����пx��&�����d�*Qp��lX�����c���&o�5�n_������gp~��l��V���ڽv������5�n�Xg��W����͵w_;*��Q�ۍ�f7�J.�j�|_�?ף�vd�l'o7�k�]Z��7��'�M���N����r+�����of/�:1�t酣1��e3�Fe��V��FM��᮪F�K.-�@�i48;:��a�	��d���`R6�,��"�_�0f�²��Y��������L�7����T�BѧYM�n�u����a���I��)�7i�̏b�-�iQ�w����sт��<��k�(�=�p��/���4c����_\y�[��Z��V���x����^>��J�/�FN����؛��������醈&U<��$�+�Z��J�FnO�L�E!Bz�V��I��ڮ-��$�[�;��V.Dq��`�&�?��i�?F��k�䰹;7�`��x�;���A�<Y9}�t8�8�p����pt1�� �����~)9�wN �f^��ӓ�6�8[��J4����W���Q��	�g�3i]_i���s���㳃K�NP'=D�=WR�c�)|�HG�[��� ��6�PK5��N��x�Կ���t������u�+iY�=Su�?JJ��y��E���fȳr�!�'1��8}��~\��[Z� ~���ӧ��N�K�`�4��7��p�f���&W�K�����?��^    �f���6�pX�e�0�Dʹ� �tK".����#����I�����ܼt+���doI�'�4;����U�OzG?⼼�*�h5�nI��b�o�F[$Ty?	U�F��Nј_�;�s��ry����z'%���Y^��,��7�+U�
�Z�L��o��F,�'��6�^x}q��*�\�c��Eگ���8�D3��o��y/�ٍ�ZM��VnQS���)
&SNx�'�"��7X�3�L�H+g+�UCA�"2$G *GdNޅ�M��P��p(�-g%)�ųT�̲�)H
 JiGU�@R5ԃ�ւ�t����Tf���X֖%��K���x�� )��.�c�T���*���ן�_���7e�/�,	�09)f�d"knyHܰ(ua˰�
1���%�#w$gSv ޷��*�w:	��)�l)�����	?��L�%N>�۰�T�^*�=hU��e�Ď���!e�
J%�Yn1�2`L�^�d�K\X��,1$5�ZY��Hj8�"y���$f�C奓-��jG�yY=l��7YXi�����
�?6���t���֌�5�{�f�d*#'ԭ��Yc[�qy	���j]�ҚD����U�m_���ne����֚�dzE�,Y�dPoIdS����;���rb������0 6Rs�ۇ��r��|�0��'[�db1��ҍ��L"Y�Z��i~�Xi(�J� WG�e9�B
�r
����du�]�1��U��f�G̷Nwbqܱ2��uQ���aң�H��C�� DWT�����	4�"сb�q��jktˑ���A�l<����,�V��� ����!���Q]_Z�]���٧j���%�jv�F�Hm��oWet�����w
�����<�p8/z�Y����_�Ay�Q��ʅW��X|����v:�a��?S��_�7�z��~��..�?~�?��O���o��79z�T|�A����]"�=������/	���p�5���J6���˴�*ZG�E��Xb��D�0V�����؍�ﭙk�YH����K���We?{P�Q>�3O�p:�,�ђt3U���0� �������ʡaj�B�.7�u�Fs��(� �I��4Lqg�e�Jx���DT�)i�J�Q�!+qmLk�e.i�#{A�5T(/9�]`�������j���^l�gT����)C����85��R�$BD�,g4��콆�>X&����,���UG7���K�ރR0Kdh+�R5����܂�
"3����BW�-�\aI�Y�JY�[��M��;e�r�h��d����O��J�k/��]��#���22k�6�\�m����_}��c#�~w�_�t7���<MDhV/	4��w%�?��ْ�E�;�a��<��t�ÁG�6���C�&���~8��a=����|���_|�?��&���wv��s�ڰ�Ն*Qt�8��Z�/oؽѭS��Nq�����DI���A�M
�%�V��]�!�˹��Z��^΀�;Ȁ�*�y�ݡ"3��L�Ss㉕ҠQ�(�h$�DGJ`#4:-1�&!���ٻZa��E̮�G�]K#qrNZ���u&.EA���	ME
�N�XѫE�j(�"C�Ji�,cTeIs�3�{se�=������NV����y�YH��$5��]��VV�{�܃"S�O
���<S�'_
O3Q�OP�J�4zӒ�m8��E�ם�����T�����������r�F���TN	e蓧�$�K
��.t��wO���#�@��RG�� BI�I�k�y`��x[t���*z��?:�v�8C�����䭳1X�t������嚎�*~R�����7Ȕ�G�\���;~z[�i�r�$��?��*�)�JYO�b��賟��ӽ�Mg^ ?�A����Xh"�'�'�Nrs�`�Do<�]8���!l.�LYgBŶg�O�_-2_z�:�NsR������6!�f]���tWx�+<���Ӽ+<�m"�6ߏ��iU-~�U��j�eU�X�l�B�i~�𴺦��
Oo��dWxz�Mv�������n���]���B�]����}�ӷl����Zu?	X�8��~S�5�ӻ@O�y=˛ǜ��汲�;۔���NE�u�0oX�[��,��Ȁ����8��9�MwVW�K��T�=�<��{l^�!0�0�@ib#B �s�y��v�6�y��4VE0]2��Q
��Pc�D��\u�μy_]S�j?��1�(9�T��J����a½�Q9��J4 �
d�H�e9�u:di�m�<���_�]�N~T�4r2�j�042.�G餬�F�RV��3l�6DE68�][�U�>yƕ�˭
�i�|�s�&
Yn�I:a�v2�k:QQpU�,SC�� �G���F�Ūv�ȊNPw)�<Yv�{�y,I��z𻠓�Z&����l��L1q�c�3����J��e>i�j��M4XV�l�D�Ė��<ב���c�L�z���@my�A�T6�$����5�J(ڂ���HoJ�ڡ��U��i !p��&�fh���YP"����@�6�$$O-��J�����>��O��d�Pq��Y&ԕ�J�^[Q��iK�'E�I�ӥ�J˹a/	
A�TV���̦�p��p�����Sb��IwvVÜ'B�p���.�e��I%�+����F5�jG?؄:�x�xD0"���l;�����رܚ���"��lA��&�J�YM� I8�B�;��q�u�>�sA�`{�u��'^�vh�Z���g@ebr��৭�s��Yy�$�j�bD�pD�L���;�������[[���BEV����'��ؘm�,q:���ӽ�-��؃"���O��'o�UhF{7eJ�N��8r�؅s���=��!��?ժ�r4z�G{7�G�6Rj#�k�O7�����)(dR�����QFN�o"@�}S���TtN�ؿ.j`)p+�l����+�]���^AW���W��z��W��+��܏��i���ػ4��-��w+�+�+���k�Ȯ^�&�uu�
�`wWW���Wp�鶫W��+�/���+���5�^�ӻs�;�mt���w���N�fEl���H"h�n"1g^+�_4���qIE"��1��cRw�ӛn<�����y/N#��.���4|�ivci�V��%�r��bOl���b.��r���R��n�&6z�U�bh=��C���h&J'E�`���o3� �$�P�{HNz%@�,�"�lh
�@Y��*J��*�� ��}_?�uج4����� �#�$����6�^#e�RFq]J�a�K���?<���������������;#LN��(�Ț[7,�D��/6�ֈ	]�>8�lYv�kP<E� �M���� 7� ��鲉Sh��� �gp�1��3�~}��-��X��@�ٖrJI㵷m}�~N�Q������`Q� 3������K=+g�*�A�@�C���Ѣ�ma�,"6�濛d���4�Ě�k���W^YA��tK����\:~2����V�Lyy%��U�jy���D ���U�mf����w;٫و����8I1�DwN���;�P��Y��$��r�x�$��IDLߙ�����h�X�[�WSp��,p�h�� P�b�}P�F�mpڄ�'V�����G�&��c�0a�l�b$7'�۝��(\W�k wbQ�I��v�pQ���a�sa)��tH�ޞԠ��1�)����.�P���<?�{+��P������2��?��[���c��k���JFu}iadv}�Bf��%�K���مs�^ �᯿=h\����O+��t�~]b?��6���k0(�,�-^���?~�a�������������䧯.�'n��3���>������_����ٷ��o�N�������<FξsѠ�bAZí���@V��� �o��-�h]6g�kJ\ԊdG]D26��N��բu���Ã��l�k��c���Q>�3O�p:�,�ђ/|��ݶ��S���e���e����0i�Z�m4g{��fx5	��$�����e��G?kLDu���f[l�J\�ʼb�,�ı    ���������y�Nm��lvA2��`d�P�b(ũqP�A4s���j�f�5���2YT4?E��`���:��$�]��^�ي, m�`��NH�!
���DtV�X޸!�qVv��hqId�x��k߆,n\ph杖��L��S��ST�Ѭu����z�����+�d��h��E�[� ���ۍ�����mcW�;����5�߁��ꎧ�q��嫛��%����vm�᫇�L��)��pz�����w�x��_�����G�v�j���s�^Dе�8�u���>��aNb�Ü��f;I�k��<䮈ᴜ?a`������Jn�_4�12"���3����\��˻<�Dm-��K#q�Ng_�$I�{�`M�*��"k��&�F�JCq�PP���#^XA� 6G���3���&R�b�������	�*4�M,�:pm���y�E�m��G8���>)�!VK 1$�į}��8�(�=-��a˽�5��S%�M*�g���2�ek�INmZҷǫ�N��G˲*��XU�T����cv��$tBe��������A{#T8�]Qp<X"�j�6>k �T.�E��]i�2��-� CԆq����zk���|��c��d
z"C L)��֠dh�w��m|����v�s�>>'+V�����1��bM1���[�O���k:C������8*��:�c1 6ێ��~�tNE����IW���ї�F��} TIQQ�C~�i������u&Ko�a,�@���Û��K��0-:(@����P^$�Uj���U�]e鮲tWY��,���Ҳ�,�m�ߏ��i�,yؕ���f�ee�D�F�Beiy��������*Ko��dWYz�Iv�������n���]e��B�]e鮲�}�ӷl����Zu?	X�8��~S�5�ѻ@O�y=���Ͷ���;�� �IpL�='xI��"pf�1i����%RFC\6����S9�����c���:w�.���'W��!2�@�9D$�>E9��i��'C�VC�.I}.�Z2`�e��n1���G2�F����А�bAó���4\CjR�U��i����i��l�ȼ~�	+eapz>hExL_�Q0�@J��A{�{���`X~�0�zOf߀m�,ϣ\CC��[O��/g�����/&��gm$�6d�P� 4	H�4+M$��(tҠ�_�fg�l<:�h$�0�8���v�~X<ف�ȼP q�\S$^qg�(�Vy�"�qc�>x0YXx1{�c���(���i�O�K��I�~FM������2"�ģu@�0�%͸qe���jp�~
�q�b������#�+�*kX���$�PĖ� ���N�5`-�%$�F���=�A����Vs4��E��]&Y�F,z&����A|�
��@�J���R�5(E@eA<��"�[j׀t<8���u�H�J��
Vc5�
�**I�.po�	bu�h먇S���3�+[EW�7�H El�@ D�~#��+�&�{Y2C��m�.��i��C$��᳊�?�4I�R��2��)�`���dý�J��ȗ��63f�Bd�l���(�!%�w�s�9G���r��[O'��j|葕�xi�FKeFݬ0��$\ 5�����U[<�)�U�eU�4ea�4��!���mV��F����}�V�y��%݈�"/��H�K߹,�ox�x鹩,���K���/�$�����\!\�Q�e�c��ũ>���墿,��B3�V�A	��a:����<�.1t�+�Y�T��"y*QS�I'�TC�j��xq}!����6�^�En�R1����,f��gm$rǲ�bYzl�nY���V���#�,8K #B�Hy���ݐ�i3QO.�����i��+�̜�0��g��B���Qo���RUKv�6_B��$.��0/�n��
���y���ZN�[vX�FbeD� 8J���H����$�$�����DWq��iBN��4� �A�.��&n�I��Hb�J#���?�I\�cdc<����6�\g�$��!8�DW�2��B�Aύ!�&F�r���I⽓Ģ�$�B�{"���^�M��"��TJr�,�#�$�lb��J�jm'���T'At��Z�0)v6��Ib�R����I̫��]�`ɉWׂi�&;A;I��x���Hb^/�di�d4#�@���iY�$�Jb�R�/��$�(i���2	���v�N ��$�>�"mS�'�t���j�q�T�(�PhY1�/�Mb�����v���U��К))w��^�r~E0���^�A.�b�C�?�D,�8�U̲l-S�M��pMFO&�(ہ��hǕ+	�AmA�
a��*�y�`��|S]�]Ad!]��y���$���.��/��:+�� ]�Pq�M�|�{��D��:SzCcg�gwt�4��D��ƛ��h}8�s�t��!�8��<2+�:+E�'�\�%o��mOƧ����/˵�|y��iV������=<������ŝ�G�r�M��K_5�==K���8)5:����M��S�Pp���x����m|��"�m+r������N����e7~>�~*����F�]:Y���噢0��f"�g�sD���Q�y~#\�L�3�8K%�R�d��Z�*��;�l��2,oW��8U��9�H���F0X�7�Ln����(Cq�^RV��2���L�uZ�Me��b(]������E�� �z�*dND��AN�Y�2�]��} �U s�(A�a>�[Pτe&�չ�+�����
!�~��m�i �TA3��L�ڸXEk@e,�#6It��Mu�jmX�B��VV�J�J�8oi"�)Ɠ*���v�6v��!��Z9���@R9�uamH�B���2��*2�	h�Y��Q���UWh㮀5�N!�j�W�q������ �R/�w�6�M�q������B��l�l`m)�Z|E_59�c�!Y�F9޷Be��Z�QI�8A�É� j��v�z۫�`v��u?*1 ��:d�J�h�<��2q��9�r����Je.��Z�a�Tr{���#��#g����c�c�ݏ�B�U ��l�=# U)��	���nȴ˰�L���@��x3l�W�PƢ'2xG�I ,�k��mbܝ$����w�C!��.bBD"�b���M�{vd�w���$n[�A����
t3�4��A��#.ЅuҶ�:I�EI�NV'+dZ��J�ň�J�ST�@�ZS�I⽑�m+1�f��H�j	�i�d��u �損W��I����;6�GW��J%��i�Q6r��xGC'�[Hⶕ̎���$��v��6q!q'���ƞG���{"����dH�����)�s�Y�=�����#����-$q�J�M���8�Đ"\d���Z� ���Ub�i���W��vDZU�u�p�u!Gm���CJ�	�zu'���������%�
ҵYg�*7�#̵�T٨�<qBI�#e4���7Un����9i�22f3@⠼������g�kQ�դJ�D����'*��2-%��6�����Q�U�w��S��!��n�Ϣ�3āwAQ0��S�U��P�I�yuU(�*oe
�vS�����:'�,�Jm-�L���:r+�ϋFBC$g���@�I+�6��u�Y�у��[�c���6�
��
�)��~��hWe�O��R�.���9[����E��Ř���V&���;��
B�ch��$�=f���g���v�7���RZ��e��9>E��]��:��$t�*�)����������eh]�6�v�����&�P,3�@��G�"�B����Z�K[�~3�>�b�V;o}+A��q��(5����Q�_|0��p^�~�/���:>��T����\��I��m�]�+��sJ:��N	��SrX����������]I����HʋX6C�">|�3�^.e-C���Qp
N�1\d tF�����0�e����QV�y�>�te�:#�V���ewV$֦L����kC����K�p�r�`Fw,jE���$j�[����<tU�*��K    �K$ �#�im!)�hݍF�
�n��̔HK@!�严Vi���_t�,>�R���18e����6�x#�ly�����δ�L�δ߾i/�]۴��i�v-��s���&���aҙ��V�64PQ�D��,��Q�Vƨ3��a���о@t%N`S�etF�\�ag+n:^ۊJ���Q˝���Z@wsV�w���A�P
��YJ.�j����XQ*FV��HrvJ9ƥ0�E�ױsBzD!�M^��sg0vcg0��`\;l�n�$�i)!��Ёk
PG4G,�S,�x"�p�k��#h��`��3���,b�*�b�LɗN)M�bN$I�2F���}ua��R3iEx@�,8uQ�!�b�����pYD�eF�F�c��r������Cg��B�RTh	�-��Y�LB���ݍ���)�h�ƽ�(��-�0,���K�]�3ZB�LbC0Ĕ�]��Lkբ�����Ng/RI�8�g�e�Y��e�˾�"_òGI�8�\�����q
Q)ko���(賂�h�$�c�-"Ǚ��@Ai������w��C�X��(�M����Fk/�"��8mb��^i(��J��d%q��*6�'0)}w$W犯�����m�V�mv�-�cs��
�͠M�8ڞ���y�EFK����f����,X�V�x2PYG�U4|p�5�C3�ѡ��=Cɽ8��S%�e̴���3I�18�%}�s1�v'��2��A�D�bPQ��Ņ�FU��uB��a���*��X��UC~�Fk�$�y�ѕQ~������Ob�����4�1?��U�/���E{�9+"�^g�b�Oo?ɍ���Iqo?يU$D*�e:��E�.p)Y���~R��'��ӂ�\�*�|2	9�/��YG'�n�O7�oy��I2� �M��� Q�@7+�oa�]�����c��,a�B4�C�DU*���?y�EشU�3��0�_���~�>��V㏲���=�ū�ʸ˽�wF	��|��_��W�4��Y���o����ϡ���M~����u_ɖT&��j�ٰ����k�Ǯ��M�4�k��8:�<:�7<駳����j�����~��7�{�8����o7�k��8N�<�"W�ޝ��k�vT�ͣ��5�n�\�$�u��l\�n��ڑ�[����Юivihq/��
�<d�7�k;����ʭ�6s0
�������ҥ��0������[�Ϸ+�7�����7/W�\?�����`Z��'x����Iɹ���N��I�h��
��/g�Rl�ي:��2I�L��O�AW0o�����Nj5N�I��dRKm�N[��[$ޟ���p��]Sd�����{��~��h����w���ʛ�:������\���ǃ/�W����d�a���JĶ^6{��=�}�0���>�ф��'SR<z�U˲si���靉�(DHo����J���<)�Q۵�]��s�z�Y��ŀ(�����,�M/|��Q����4�r���9�0���z�H�xФVL2�<.Ο,ܿ�=8]��!�i�&"�_��;' g�/����I��M��rF�����m���z�(���3���4�y�ѹ�������?��/�����	*���ⷣ����>��k�BH���-~|v�	�g����G��wMM�g'�?	Ë���N~<:`G?.��ǣ���[G?����G�Gh-<}�O��Y�çi\n�Gz	��ſ,M������f2ʟ���S���t������%^���unx�IL�4N\ꚣ��X
��Q�a^�f&�����{谈�B�|��r	)�[rTi�o��VY�o���я���8��-�j�o��%�9�[r�	��Lz�U�[�q�#�9���[�1���"��%�n�,�b�o�F�f�V�G?�r
N�[�(�ѽ|�����\�N�����6=��ƃ���f�����/qͣ{��-0�:�q�rQ=�o!;Uc��<�ϣ����Ÿ�Ev�ȷ<�|����9ۤ��6ZiN�/��)s�FeH�4d/7�΢���D
�3�.t������q�K��l�;�g��_���D:�q�T{*�Д��i��͆"�����L��Rӓ(�G��)�!��:�q<;�M��t4Qw��kd�P� 4co����B"6+�"�9�O&mh3��tV*:��Ѱ;���v�\1��Ov ���@N:"���5#Pj萢�be�G/R7f����%���8��(i�B��*����������H��3�h�u������Ϯ
�@�")<n�9�댴����-��r��֕`5�(����� Jl��Q
X^���`�}����90�]�a"�B(�YZ?��Z�Z� ]	RWCP	+�	D7�q㢳ѯ�xp��m���`��F$"�1�{�Y�y�''���u�éh����ؕ�e���"�&�'���2h�����]y����B���M�ƃas���y���b0|V1����&iT�1�_�|R<%,�ٙl��Tɴ�w�	l�lUȈja��N_�i0n�Ld�mL٭Ty}�l�I�<pj��'�#�y�����r ;/¿e�s>���ܙ���K��^�K�&l|�;����G����2�՗^7|Q%^/W��:�Sǭ����֩>ݧ�x�_�U��U�P�dѬӉ����u�i��̫�"S��b�b�*��nM��.�/8vkK0ӹ��?�2Lh�.7�(ť���	˾�e�ֻeY�7,[)�}�~�DY|2$�U��HvC���D=��k��]����,3s�t6�ݫk<�F����+��>��ą���qhgJ�@q���WHe2Q�i�b�d�2��%�Q5i�ii I5�Yd�$�%��+4�I\vS�R7��R�]8C���9�N�$�-%��|Q�{"��l*�z�găcĆD��Rï�/�I��Ib�c�ao$1�m��`JM �J)v��6�1�$ލ$-%��$f���C&^RO �2�Iʡ�*r'��(�7_Z��H�:_T���=7�Zc	Ή(s0jGC'�[Hb�V�8 �?���+������5�K���.u�x/$�ٱ�?��<��Z����!4�#�d�$��Ib�V���	V/�Y�6q最�@��Fqe�@�l��BO鲵V��N��E����eH0(Gu�)�շ8�`������.��]	��IuҕCA^(���Y��k�������7�\�Ɇ����D��2MI�!����T��;�B�.�-��C���R۶���ݯ#߉��+4�d9��[���UfL�Z���/�;ۍ�����I"�N��SxY��>���y:�����(�YQ�Y��=�`;/�;-�{2>�-��}Y���˫�O��B��M���g��z�8����Wl���0��Mk��1���`���c��&�DUQ������7k�׬�E2d�*fFVf䉻ƍ?�σ��^�������dJ�Q�~�U���0'���OH�����5Ą#�m[-�Z��ZK��13������_f������ҩ�U�i�����WsO��W�
N���,�+�����d�hI$$���Q���<s��C�Ds��S5��3`�'/i!%h钋�G��gan�R%٣Ǯ�D��Z���f!�7������l�rh�U,������Wi�-�k]�����p �䎹�i��l��!P��j���178�U�2�9#��B�g��M�hk�ߘ�V]���.�sFP���bݘ��*S�ZD5@S�1�R����m����֐�� �O�b��b�6vsim�����c!�AJp�dY���b��ژ����+�)�*�3�p-��:��+�D~cnxA�z{�������*��x�-'���S�}v�dʴT�N�sC���Z���j�'6gN�\`�y��܏�i�}���S��%/����*e���'�M�"%s��Q&�Y�3sC�.*iLT��6k,f�$�N+�>��&�;\/����ï��ie9�	0SD�%�,�EK�{����dnpo����U249Ga�[	J�u�{��h�}r�M�P�    ��p4q��M�p�����V^�L2q�k*�i��dnP�j�*'���!na�ØM$
�s��'#�4���E�n�VQYB%,=�P,)&������wj��@4qo�=/�?M,�)���Ł&.\��ܳ`KK(�&�wB�`4��K_��Ŕ���&�{"�d}�c�&>L�}/�?M\��w(I��h|�b�p�����䦉�N�E�n�֕��"yă�Z|��.S�O�en��?M\��
	���$�e��,�ܼ�17�Zk�6Duk��L �I�L*L�1����y୑�H$�&Cl�:�X��/Sj��s5;�xȒF�RD�\���Pz�|sC��$/�Ͼ�B��jZ�
�M�����`LLF2�(H��M��:J�_6�Rc�pD�M	���A���+.�G��5˻�b ���*i���2�D�MK:���ڭRy���:T���8x����r��ᴰ>�t�Hi)�#�q�4���s����Σ\��g)
m�5ݞ)JdD��4Ih�9� 1��dd)���l|��F�w�$�O0�����7c>�H�
�d v��:)�X��ċ��eAyo�V���/��72��{�b�/o. d�Y!35X���j�!��6lc[��x���'����_������^��l�*�@���2F����ٕ�d��K��B=ʹY��^GGuL��M���"Q������'�@t�<��BF�GQ�	��x���u1���j2���u��4�!�:�OE�q��Po꒬�n[�*�jAIJJ�����cmG?�_��YFܮ�TT�ȓ�)C�\CB�8o-U�&�X��(���je����M�N�
#�����)�SL��^����BSOoH\��(�#��c\G�oMo�9�ہ��p�v�Is�=�牃��ZG�1\���>t�B�f��HO\�� 3-y�6�Rz@w����0�b��x2�� �0�<R�s��Z���X&eȔ��B���-�
���7q�K��:}�J���Ϳo�}��������{�'������*@�$���h�[����Ϳ�B1���޳B�w�`]��t}���{����1�hȿ�C���p�=�J�|�^�/ݿ�b7��,�˰؋T�!�;P%�h0�B��f�.7Q4D8���ȃR1�(魦�4��b�@�s��Vu��Đ���y��ǹ4qizc�,��!t���cl�˃w��X�����V�2��+q�' T �GW"U����j��C�*T�0�I(*�WIg����}9��f4�Tu
.K�ZE�Ý�蟑���Փ��E^;x��H��z^D���ĵ������K�i��A����g�<�=x��o�٣&��D�	�D#VKM�1���X���Gw�-� 9�����q=Ӧ�L�S�6] =ݼ�M'Y�$B$�(K��0c�����|N��tP�Օ*N���b�n1��`b,x�gr����
����g�|�z�����b�Q��� o%�5�c̓L�9{x�mT��pV.2^b	�%�C�ണ�8��>4Hͳ�6�xAk8��%b���*�#f����	��Ś ��mk��{g�ݾ�*�34���K�N�\ǽ�}�]S*�T���ʊGؔ��2��ZR
q!
��^���2����˓غ<�&OKyrs�$ap�P�C�$#��-����Ed"6�L�ʢt# �5�y{��w���f(��y[N<.�P�)�������ע���վ�M�/Ծ�������q�#8N�Ģ��<����fM�Z���ݨ��䩚�LV�,�ȓ-�sU�ZNv>A��w3�:勓�0�ya�͢�k%�m-��e"�g�jh
?dL��'��M[�d���'�??�g�l�QF��>^]�\�ߩ��ߩ?�?8�����s�o<w��8�Q���Ew�Vn��2��&ݨ��{��?���o7�<����]_�V;�/;p�ż[������;�ww��zwG�{{�W{��?^���o��v�y�Z}��O��{����~���f��S���������|��{%�xZ��hvo��j��9���������L>A��ӺvG�o��F��{�=��ɧ��~��v)������N���{�����C,}s��ď&�es�c��Ie$����j�x_�|n�U��_�WÓ��ݯ����j�M�鎰ڃ���J�xT��_�l9ue�h��������B���m^\�c���)��Lлj�i�zj�~�R��Y�4p~�Z�P'���v#����Nz���ϓŝ�����/�#��uv��Mks��1�ǣ�Gwu��t�lv�لٮn6S{���8�}ˀ�}vu7��
#�D��bu6������Z� �O���q���m>�w�~-�k�cO&����#�8����_t����=����MݱYM�"�[H0��t9�Qir�U Mf>���n�?.ÿ��;ߌ}7 gO7UI��3���/���[���M�-F�<��]��x�&�~��t�<}��������t�y�҅������?
7���������	h�p�Jt�zD�c��0��\�!������hz�i�#�����i��_|����ǳ��?������>���u/N����+~�H��������S~t�'x����+�Wlr>�R�q���?��#����p�{��.��_��?�#`��{wu����)_�I�㭮nػ;aH��;ZE�� ����������=���u�1�n�|E�� R�O�(l}h���NE��@������Ϧ�^�U}|�#V���(=Qr>�Ó����Tj��F�������;}�3��k��"-q�Da�7�C��8޵����<9�c�x��PP��{r�V���Z.����/���o~8��2X[j�3K̾����;j�N�fh��o��S��-S?9�o&-�r��<����t?�`��|=`�0-�L��U���TJRF�
P�_�)��YQ�ۜU`�
')Ì�U�H��Q)ju��N�X���ꊮ���A��@,��$�h��\�=��Jwѹ��M��xl��=����f���O`|J�s(Dkj�6"�`@�~��G�eM��]�'@���ŕ�@�5��i�"6��]�2��룀VA�yҹ���M�V ^�=��b��+��t,^����?�GD׮���4P��%-�9��)ka����	��-X�uX�aa�"'l��qas��ۥ�^��S�5h����F�
�[�����1Ζ+և6\��{��4Hׂ�r�hd�He
	�j�LW��C:�����uzI�u-XE+JjB6��<(��9��a�U��uvMv-`e���*p���ȶD��M���e���y�:��s�����xr5�v.��` ��V	��>y��Q���3���F�Bq�Uru��x�E`3aS��1܇��L�a��F�ęm����<�3��%Tʄ	8+W$�ĉV�����}LI#�� ?�j�i�	ء
�*Q����3[�EQ�������-����Rbw63{Uf�i���g�Xp��W�x�"��'����^v����袶�oY^+��o�ڏ�p2?Ws<�\��EY���C�Y�;Ć�Ƞ��/\P���L-�Y�ݚfI�,8(�����e��d�6�t V����az(47�V�0�\"Ҁ��0���H�E�c2�i�~�����j�l4/DWDp�F,���K��Y!5M| ��M3�IM\eDYbkDp�(�IPASY�^�4��hb�S�=�������p6�Ȩ�6ZB�SV��R�~<M�����uV��H��#�+AL�EP%s{
ݚ&e_M�������<#�F/��3Ms����F����͞����uqρH�9�>9bbpI�l9���N��=4�ꛝx�y��_�ƥN;�s��笳�b�����0��o����V����Dk�'6SM4+��̄�}|Ȼa�7������zB�������FNz�d%����-�P%5�1��ݿ���̵޵*�J��0f�3KQi%�̎�G��� m��!�#sQ
�r�4    ����ye[��]��a��BAh!EK^�%(BF�
��StD����4�ܧÝfg���E�I���	qgqGL����J�E&0�}��<���'؝����n��S&������+ھ�RМ��>d0�f`N�;g�8��E�������d�.�+�����_^�Il/�R���AY�/�zy�zx~2���n�����|��4|���0��?��k����ݯ��`�N�Z6`�e����������_f��s.���Si��R�=�>�\��d��P���J��D�ރ/��95|���XРWs�>�Aόؘ3�RE��\��Y����R�#��6�S�L��0�`�E�{t��><_8��V�&9B%`��Y9�fA�hc}8�M2)(�����m�]u�rk��X�*i�����-D1l��҆�1@���`u5��?P� ��	zc�t��؍am�{��W���hl
�z��ƅ�$W<�m����ՐjOdV��b)T����ȍ!m��������,�Y�����(�Ќk�1���a��Vٕ�qAg��x�2I.:p�L�I�g���>�<�yʷ7���YPتY�"+���"*Qo
5���m����_B�\+*0��8+'Ys �bB܏�i���>�=��:��Uʰ�`�zK�(x<��l�<�_V�����ʬ�5q�@��%\�/#���D� D����0�2E%�2���!C�"�Jڤ d�tB���v�Kxf��*�U���R��"2��ɡOB��(s�x��}���l����E2�6���!z�4q��Ϫ�k_�2�Ğo� ������}�5M�c�7�^�x�1���Y�&L����)��4�Ahb��� ����A�wZI�7�"U)���X�iæ����m����'�$g#�~4�D%�1iUiى���W��.�G��q!�$�0��=�nM���}���N�5�Ff��VM��r�Q2#����6憽���:ej0�o�R1
�J�p�v%Z����<�֕��X��"!'�U�$�D��l^�֘�fI+�q�9��VI�b� �{�|s��P�R(>���\x�}���D���1�p�4�lK��'È�����,)5��ᇢĩb��F��6n�{毸���8,�K\��+^F@z�H������*��	���+H��
2!J�����s.�t�)
��LN�\������
���=����F͒Y�z�DW�C@�80�8w��o��9�FO��㌠�r�G�V�� ;'�/ڹ:��	���h�I���R��US��O�I�?i�'��d��'���E��(QG��)�i%2�38C>ܣ�B�a�0��.e���G!�FW��w��'������7_t�Qe�K��Hf�N1sB
��(kc����|�վ�����+��}y�p��!/K"z>� ?c�&����o%��3@%!�2.^t��-ث�q���p��}���)2ݭ%�pӤ�4Y�>���*}�S��34D���	Z�)t��]�:ed�T���E��h��q��K����	��x���u1���
b�/ ���{z9������I��Y	ض�T��B��<��[[�"�8ڎ~��^� ��e��Z����,�mc,�ǐ�s��l����7Ld�t�%�-����t1�|�Vs��`�jM���A��!����9��1j���g
��6*h_�F�0�Idx`�d��lM�k��X����I(Lk�͎G����\��C��99�v�
�^�x���*�u��}��� r�c��*�XY9�U�B���k��,�
�'���HZ��5�)����k_2�G��ؕ�o�}����މM�{U�4��3��$Q�h���R�]]���-�,U���H�!��R�i���*��%Y�������
Ѥ��������L�CH= ��l����x2�����p3��lw���v��v+�qnn�ţ�f��&�
�c�S��.ˀ���#�9��{��A2j���v�@�+��-_�"�n�h,1��l�P:ŵ1j�{���rZ`�;C3ˉ+����\���B;dl��Dbcb|/�6��������
�d^r����P����N����I%��G�tԆ9��]W)-/����9|��ɘ {lR�q�!�D,�O\�>#o'����W�/���A��e�g�<�=x��ٍ<{�$��#Kd��Ih���L�����q*��l�p�
p�#	�jP�B�l|���6�����'S�T'҂;�sfDD%�����r�'഍�Z]�˧T�j"�ă�$Yq�h�I�lC�&��o������+\O�:�[8���&ɀ%}�sm��X���(����F%����4��7$(o	g6dC9w9�Κ&�m��b6��t��+�Jľ O�R��:\��b@� �^G�4cʰmk���b�ݾ���c񁠌8
U���,(=ٔ�kQ*|�J���I�^�R�<a����(��Md�A֎Y���-Ob��M���<��}���[�s��F�'!��Z!MᲑ��j��$�A#�s)A�V��Wr����WJj���U��H�Ϛ(A�crG�D��=j_n]�˦�+7��8p
� �Q2�kdA1�M�^�<��˓���/X��RT�� O�(���-�Dg�,��<�7E�)�ta&d�=�>$.�)��VR�T�'.ܽ������R	�DRF�>��޴Uȥ:�~����{f(����Ԙ������p���/���3������ �>���s�ό��O>\t�'��|�M�1�7�F�}�3���_�<x���Q>�_��J��!|؁�-�����v��ѽ��<ֻ;���;��;xn��"��׷[�{����;N��݃����?��w4���b���Wo�����;�>�+�x���zuG�{{%W{5͹�>?�׏���g�	b'�ֵ;�}ӵ4�_޳�qN>�g���K��~��u*F�;���7�bq��'~4�/��5��O*#���7U�����[pۭ���:�����~����T��h�Ow����WǣB֨��:g�˩+�Ds�ן�%�<=~82�]o����O�g��U�M��S[�Ӗ�΢�����:�<����P��wһh���,�4����Yy쮳C�oZ����<��8�����Sd���&�vu���[�����[�ﳫ�A4P�`%� E�#�Q��gg��!}�N�+�?o����k�]�{2y�T0<��߮&���������tn��j���B�����p��&W]д`��������2�[
߻����wr�tS�t��^8�����k�u��?��4�b��#J�u�m��w=Mg��G?��i��H'��/]x>����p3�\�>�az!~�������A�)M��:�o	���O�����>�/����&8"����f���8�I<�	����;9[����Y������ٿ� �$��[8?�ȋ�Y9�G�y������K���&�.��w���<�]�	��u�ׅ��|̗t��w2�1�<����{w'	Y~G�(�`]�����}3��U��.:FՍÝ��U�@�����M��=ة(��?9�=����+�����AzĊ�|�'J�'x�3}��J�؁Ԉ�3xr�|��Pbf�{�"W�%��(,�f|h�ǻ�Q�'gq�/�
ʴw�ANԊ�\^����|������'W_kK�|f��w�#5?��`G�@�������M�Bq����e��'ǃ��ͤ�"[.��"W6Bє�g#,=0��R�p�7&=�*+��Ãr1�� u�u��T�� �mv�����L�O�8a�K�(n�8mc�&[�+��J��<m�q��Y�k
�.<�+�t�q:�4�1����1j��=Zl�+�< �9#�[Er�Jg_��am@�~��G�eM��]�'@���ŕ�@�V*�,�PR2�R��q�6�mk�ǿRȼ$�be����"����k�J����
������
�A���$ிI�������b�;���c���d������3<H�7��p�~�+^� ]RUAʄ [�    `"QT���m.���k�l/P��4XׂUW�r��t �^��2�ZEɊ��� ^EO\g�4`��
ȅB�e�2�H�§�)B�gyo[���8m��ޚ���j��\��C�@�r5���|�4K�rI	�g,d�s�Ѳ C1<���"eq��:a�RdBg�w��"�(��Fp�Ra�	���9��_Be%�͘�u�X��!'Z�v4��h�F(� � ?5v�i�	ء
�*e(\a`e!���O�rk��Nm=����.�/%v�S0ݻ�2+""�G^�-�r�}�'}���^v����袶�oY^+��o�ڏ�p2?Ws<�\��EY�>�S�}v��]���\���xႊ�Ej9�Z��4�	$�q}v��8�(1���d�4���iVi�47۟L}47�ΘVI�L��vFqji�z�1R�ć��y/MLO�|���� J��E�S���LF��!nh�� 4��oUWa��y&�&��Bta\(V�N{�M��Ģ�&�	���Ut+ED*�{'2C�r�	8�L�����w��9t;M\eU�RX�a,qIX�]��{/%�M�&�=5��>����UD'u�!D"V�`7)���ۦ�C�y��&��΂c�-���6i�4L�&U����+Z���q�RI|�(Ǭg�9�7/Y+WW}�L���2��`�5�7��x�(aQ�e�mk�O�.����e޵ୂT	�����2��1�7�w���6���
�dN�@�R,R��<f�E�9��H�i��f)DT�G
!�����cIч��=���@9s�#��7�,3�-�F�/`^������%k��!a0���H��}:�i���*ZM�aH(�j �%,�����f��#~�}���J����F?e2{h8y�"���)���C�q�`愸s��a�]P��?M./NV邿��z���Ŝ���+����/�ү�g���'Sz�����·9��5~B��>��!n�z���{f0E�p-�ֲ���IP����/���9���ҩ�oX�B`����K7�)�K�:C�<	�U��q�!�.}�X���ٞB������pi��'�
G����M��N����������1�S��#Q&΄Ӊ1ӣ+���y�AWjA�(�I��L)�QB$S����pp 3Z��0}�9����_��c���>8�U҄����|�I�T�	6�ƿ�><�U��EV0�G�����Gax�࠯�����A+jhu&RR�؆J¤��ŒbQC�X���!�:gI<+���T*��Ɛ6և��Z	!K�@5���y"�uƊ����X�l�s.q����	�aA9�V-7u��LSc}xy���no}��f}PuʈO�m9b�e��Ep��-�V��X�"p��W2Ie��l��JK�~4N�`}��U��=�O
�bUD�1������(W�X��i����ū�wH�f)8	�j�R��z�=��o"�+�e�lϫ���W�"^Xq�0�M,)$i��m�� �)�ô�z	�5�&Sb��8L���%�I[q����enp{^0�}��
��t�DK��O.�4�hb��j�*a)���L!�'�ǋ4+V��S��4�a27طZf]Ge�������'Q��Y485�4�Ah�}������!Ǧ0��0�R����^�;M&sþidGW�Wx/�:�}!9K�����>M�N��T��{��8��lI��0x�R�Rr*�Qn�4�n����&��D5�!n��H
e�Ked*t�b��ܰ�R����Y sw�Y! ���� rcXs����kx��4�����U����k}Qcn8D���������,M�E& �Yӧ �>�4A�Q!)��+?�[�"��Y6B�<�\xF���,�Qdr�$%޾�6�����B�Hv�1��.�Z=ŕ�蝽�ay\�_��5\H1�#>	0>��5�ٗ��ڭRy�б
�
HS�� �I��E����E���I�P��g#�Y3*�ƛ�H@v��5�{փי
9�2:��X��Yj��7����h�BO�ON���j��7_�����Kú%-�8W<��T�b.��њ4Z�Fk�hM���iM��5AC���	�{v�g �q�&X� ��xrHc�Bȸ�9�`_��2�����F�w��k�`����4o.���\�v+�tJ�E")��3\,�lzc�꣑/��72��������M��H�q2$���Ag����o.[Åu �@P��!1�£�����b��w]�����%���׺1�3ش(c��ǭa&�ȼ���-���8Z��n�x\�*Ļ�M���B�1�V&\���'p��q�F�� �;���x2�����p3����r0<�����B��K��m5\;���%-(y0(�J�q��<����v�h�۵�J��T!X"eР/R$����T�9J.�-�ؐ��P)Đ����%��36�G�u$QU\��R�ƨ9���P���Ocx����uC؜���%�Hh����D�4(Gl�LnWs�]��҅��t$��@t.���`����|���v`�H�&���h}�D��s򫄎���!���+c	Q�d��='�d������������7�~����jc��J*����Z#�(���W,h����#Ϳ߂ɪR�*'ܻ�:�U,$+��څ�l�����ԧ
ь@>v�4�6(��I:P1֕��M���*e�z��t�6��,v��{�ؚnj��Bу�o,0�k�L�D!�4����zF$D%�u	Q���r��Z�Yv�,���^F���sJ$�*�	����-�*��Q�ػ�P��Ld��aV'�Y̠[6��e����BN�X$"1��2�v�jam�ZFn�Й%t��N뚅iY���T�����ݗ����h���`�^Á ��1��i쟑�ǷՓe������",�%��"����k��ƃ˫ᗌ��׃�[��5Ͼy�{�쵳y��I*�$"��z�@��:)^�����$J㢡L)�:["�3T3
��>�>����W�O फ�J��l,���(����6�	�ku�-�R2?pyg�'\�����r5�|σU2�����z�����b�Q7	{��xу���A�9{x�mT��p�
NK1S�1S�1�����t�wg�����x1{a�]p��(y�]�<UJ\:t�=��3ǜ���۶��݅��K��K��Ho»BI(�T���Ք�kQ*|�J\��3��`�R�
8��0`�X��R�,�g�lM�^�<�&O��';�O���%!aA�$$�q���Y��X6��:"��X��	5�h	E�-�	����NK)�;&@�Wa�L�IS 6O3)���%��?h�/����$;F��*+%8O2	M\.�Y�*�R���"Oj��$�O���婚�T�%���y����)�Uj��=��^6�`/�J�II\x���
�X��_[N�O� ^(����qC�ɞ���i��"u��$�����P�M;+�ǫ�����;�_�;�g�'����A�}���n�g?��|���OF7�v�.c>oҍ���g�����y�v�ϣ|�����l�C�"��[̻�˽-���{w7y�ww4��w|�w����E���o������w��t_����'Z?�hvo?�j?Q��>;���w�}�W��^����f��J��j�s�}~ޯ�9�`���N>�kw4��ki俼g���|z����m�;�.l�T��w0���oP=���77O�h_6k0��TFҏ�o�6��EϷ�[%��u|5<9�����?�i���є���=(���$�G��Q�u���SWv���?�K�yz�p*d����5�8F�=�;���������-U�EM��uRy<o�1ҡ�/�w���<Y�i.�����<��]g�zߴ6���y<�iqtW7M��f7�M���f3���ݏ�߷��gWw�h:�0��J��*VG`�No��L�B���W��#~G��b�V;�d�ȩ.`x0��]M�E7{;;�߃�	�����/¹��+L��� �&W]д`��������2�[
߻    ����wr�tS�t��^8�����k�u��?�"��a��w���E���]O����O�gں>�	��K�Ção��)�L&WãO`��C��o$����*i��5a���[�dx�p9�`����ˣ齦	�.�o��1�n��n��tvr�N�V�pvrֽh8urv����#	c���/��{VN��y��?����_����K}��/���p�{B­����O~��������=���N>�|�'�����a��!!��h�?����x��o���
�EǨ�q���*H1?Q����	Բ;%�Q�'g��?�~z�2T��5H�X��O��D���Or�O�S�;�qrO���J̬�AZ䊴���%ތMV�xע"w *��,�AR���BA���5ȉZ���k1���O��@ӣ������`m���,1�N�o�����:9��RT��W(NU__�L���x0����\d�E��\�7���l���E��-��a�D��%�Z%3֋��P����M�N�Ϊ˞{��Ӱ
�b<�":�\r�k�.��D=p�ƺM�VW��)����˄���i�T:'d����]tn��|Ӵ�8.�Ǩ���hu���ӹ�ȳ.�Y)�x��[���k��c��H<.k��2<��u�h-�l �r�RA�B$υ8���;òcb��p��_r�tn�w�����op���E� �
/#��W���)�����ѵk���������C$^ZF"X�"/��/�m���Uװ�ҥ@<U��AuGm@�o������Akjh2�[�iԄy�979�6�6\��{��4Hׂ�V�ΐ(�##�T����Jxru������Z���$���:�=��ٍa�U��uvMv`m%�<��D�8k#����J����,�m�^��8�rk����j��\��C�@�r5���|�4K�rI	�L����F�Bq�Uru��x�E`sa�Rd<*N@l�ȥ
O�y���q�	���9��_B������A��	� ��ʒBQ{�8�P�AB~*����
�C!�)-x�H�AV��$�2�B��M�$���K�����]T�P�S�	��8��r���~D��4oF��}��ZYt|3�~�������q��j<�.ʺE�h�O}��w���ˠ��/\P�	���4k�k�\e�G�s�(��Y>�q �Ndլ�X%z��~������J�
mӭ/5	��.,8�����ib�S+�V5q�E*c��z�t($C��ur:)�4�ah�=����UFT�pOia�$9EK6���'>h�x?�X������;M�L�@%,)3�*^��T1ʽ�ejC�`c����]�U^["��av"k�-Յ���&>8M,���{NF�&���1�B���(�%�R����4M�CM�ߪ&�r�"�H���ؘ�qc��O�@����Ī�&�����h��Xdm@�D+w���㉲q!L���[d:�����k=Õ��)x܊�k�}+��ysX��xru9����./k�o=�S(H-n%���Rp{o&��U��ݿ�����47	�mYⲒ�I��-Rj�'aqɲ���ͬpord���y�L{�Zk�f��	�l%g���
	�%���Q�e#.
�X*0.�'Iqe�����ܧ��f�^��r�$Hh���[�p�pKq��uA*�l�\Mo�����Wr�_7��)��C��K�	m�O)h�Gp2�s30'ĝ�t��"xF�iryq�J�������//�$��]����,~��~�<s=<?��wt��|�xp>̉��F����At1��z���{f0E�p-�ֲ���IP����/���9���ҩ�U��Żg}��r��j�_'p�u��,�g��V{��6ڭ{���� �ES���2���X�$yGm��*�z��<��VuE�LdT�P�Q�EY�M�ѕ���|� �k@qbPAp�0)NP8ĩ�|m@��!�,j�%�zR�E����Ë¿J�P��Q��!��G��n���X�VU�Zn;��I�]H1�l�����><���VII$���%��I V
-�C�X���!�\���i�ܗp���Ɛ6և��Z�5P��M<FD<be��rL���X�l�Q�9`�4�*'�U��\����ij�/��Ao���5�>���:E�;��DlB^$�i�1QC�hї���/�N�����HH��(��QP�ۏ�i�V��S��U]����ôN���,��P�&�!�3�_����>໨3k9d,��-*��p#Dj"{ "KO�\�ô��g�1h�g̐�Af`�C� l�t���L0r8ô�z1���xbcf�%J�I�b�3L[q߷ct���&'9��>ͪ��q�!�Q�93���}����w�0��Uj8L��&���K1H���J���C�x�i��dnx��q�W�.��"��!VdP�:P�j�ہhⷹ^�)��,s��)��R	�����1�&>8Mܗ����ļJi3�hb[�5Fm2Vy�؞�t5M��&��&}/DWQ�X�C'>�cQ���.�i��@4q_��&~q�W���Q�8-P��lɡ��+
s�^KYx�h:Nd�����zM�t1��Xn��o=���'�)R+3�)蔋NR�I�7�C��v-X 7Y8��.�	������Ļ���E���`i��z���&[�q둇��=�/fC��������么&�e#��FO�&R�e^Dv��Z=ŕ�蝽�ay\
�5\Q�+  Q( �J�ƃ�7�k�J�mB'��H�� =���!<����t�*
�u)�׺�'x�����ȃ����P�b��֓�$�BA�'H��+岠�m1m �a5�������:�<����@L�`�j'�gP**:⋁��3J�Ä5j�FmҨM�I�6�=�	fb�Am���]z'<������Q8���`A2��QX���J�R )�w� y4��߽�T>��O[�h��̹��]!@�Id �Z!F9��9����r�e V�fB��s/�����9��Vr�	���P�,��`����kC�b����j�,E��1��$F�)z�9\-&�>tu�+&4h��]$E�� ��eI����]��Gm�o�"��E����ubr-jSK����E֤P�3&f�{<~��͏ǹ]�0�H�&���_ןO��¯�����W��O
��.�J��p��B��������:(9��v�����h��e4��ZJ��S
t�er�|�-��r�K�Lf�N�$=gD�(x�fCiN���Ve�pi'���ZJG.l�^�b�0jN��!�2�Br���`�q�͂J��
U��6';p�.���*X����6=�1\���>t��A�,�t1c�M�3ʀןz@w����)G(�^�\�02
����s�<-.�����s���d�����8�ë�� ��m�}s�k��^l��˕Ģ��;0b�g�@U�r�E+f����o�L��&*��QGK�0#rP�g)��5�~���8,Ң,���\�Z���p�]2�
PbW�?����f���޽�VRml��EXp̶ĲĉVEB �]�	)���N�:���(��ށ�׀��0���ґx�fV�	c/��1jf{��BܸGk���e�X��l���!l����j��	��@<�%�K�R�1\-#�u��P1Q�R��cNTq�HU�֥t���Q>���hXt�?�;�ƴ;>>���#GI
�8j9Ah����������ƃ˫ᗌ��׃�[��g�<�}$��f�=j�T֢gor$λDD���蝬�F�lA���!*Pg�S�s�(@��O>q@{"N��)�@dP	�8M����0g�N��+P��Yu�D�K���+	��E�,{�!WsB��=X݁z��<OYO�:�[8���&����sm�U�ӢD�p��#��rpZ��􎸄;�[��;!J��5H��퇡���<�-/P��\�3.��dM�.�D�4a�$Ӷ5}�-/�n_B��p���b��D	������Ry-J�oY�섏�+�*    ��|Qq����#)���PV�kF��ȓغ<�퓟�\yZ�LHF����M&�eΩs�X�l ��a���*�Ok6��FM���o�$X*P����b	���O�"ѫ��Uy9����j_n]��}��}]M��l(�QB+8��&:�&O�E������i)Ou�WH�}y� `�����D�!O�M���zwd4��j��(reBY+)���/x�L	�H���b�^%�G���B��Q�����3�⬀�I�}������S�E�S�p�>�����x���q���ɇ���dt�o��2��&ݨ��{��?���o7�<����]_�V;�/;p�ż[������;�ww��zwG�{{�W{��?^���o��v�y�Z}��O��{����~���f��S���������|��{%�xZ��hvo��j��9���������L>A��ӺvG�o��F��{�=��ɧ��~��v)������N���{�����C,}s��ď&�es�c��Ie$����j�x_�|n�U��_�WÓ��ݯ����j�M�鎰ڃ���J�xT��_�l9ue�h��������B���m^\�c���)��Lлj�i�zj�~�R��Y�4p~�Z�P'���v#����Nz���ϓŝ�����/�#��uv��Mks��1�ǣ�Gwu��t�lv�لٮn6S{���8�}ˀ�}vu7��
#�D��bu6������Z� �O���q���m>�w�~-�k�cO&����#�8����_t����=����MݱYM�"�[H0��t9�Qir�U Mf>���n�?.ÿ��;ߌ}7 gO7UI��3���/���[���M�-F�<��]��x�&�~��t�<}��������t�y�҅������?
7���������	h�p�Jt��D�c��0��\�!������hz�i�#�����i��_|����ǳ��?������>���u/N����+~�H��������S~t�'x����+�Wlr>�R�q���?��#����p�{��.��_��?�#`��{wu����)_�I�㭮nػ;aH��;ZE�� ����������=���u�1�n�|E�� R�O�(l}h���NE��@������Ϧ�^�U}|�#V���(=Qr>�Ó����Tj��F�������;}�3��k��"-q�Da�7�C��8޵����<9�c�x��PP��{r�V���Z.����/���o~8��2X[j�3K̾����;j�N�fh��o��S��-S?9�o&-�r��<���c��KĲ����RsC\Q����{�
P�_�Ɍ:jQ���U���
L-+��@nL�����<2M�.��i�6�Z]Q˧t�!k}!�I]4K�*ѣ+�t�q:�4�1����1j��=Z���t/F�|�A`����Q�����0�x\���ex�����Z\�@^�j�@�I�.�$���4#I�� ���<���w��W+ /��x1M��^F����S�Q��#�k��_[�-�y
���Ĕ�G&d�6���`O��o���k��*X��W
Z�*b�(�Z=nk�w��ZC��E���98[�ƹBƌ��W��^��ҵ e5��v�"��@�Ӗ1&�ʚ�5!�\]Cg{�:��������:E$��<xYɗT
4J�1������ήi��l���A^M���h��&�,����um�z�׶9m��޺���j��\��C�@�r5���|�4K�rI	�g,d�s�ѲP�)��@�\]�,aX'lU��'ܽ�R�lY*^��
�cwBx�p�l�P�Y�/�=v(�OyE�%��m�a?�
<H( N;��=
�C!0U�0� Ov�xJ����;�Y]_J��`�wQu3��\�"#*yɨ�,�=q�\v����袶�oY^+��o�ڏ�p2?Ws<�\��EY�>�S�}~��]���\��S�*2!3��f-vm��,S�!��!.�Dt��.۲�kV�yin��0=�[%Â�H%"q�g>�-QR�D��������y/MLO�}���V�`p��zF,�s��%'��i���; �}!��Jv�[�����D�+.N��04M�C���ت�����p�9�R&�qK	�Lg����M7�x�ôʪ�(��Hbg�p*���g���b��=4������p4qх��M�������DR��li�� 4���h�:g��!2�H,-�8�p���t��M��Ī�&޳�q8������iL&�kI"ha!h.�o^�V����N/ie0k�ZG1ԃ�$��4�J��iV�����x3�\]��'����k�[�iq�67Ĺ�H6�$�JGjcxw�m���]�w��D��I�,8�33BR�gv�>�e���	.��Q�i�A]�r6�@�O��o��?��P
�҂{�+G��61����e�@5n�E%�W��<Q菇�B7��p����>5�p�4Hh��Ji���+PAD�<Y ��=$�7����	v�+9�ï}�����������4�#��9����Y:��vA<��4��8Y���������s�ˮT��yP��K�^����L�;��o�j<8f� ��OH����5�9�F��v��3�):�kـ����c�O���ߏ~��ι|w��N���>h����йr|��X�9�6I�b�8U�ك/��n��T�lO�C`}@�.*�"����s����>`WdՕl�T�睤'���FP���ߍ����ATՀb:�A��h Vx
J��Io@��!��+��Ѐh!�kJB�L�d4�.ȍ����&�0p@ҝ/��l�6����7և��V�2.��(��
�+\�.0�U�k��X����������<fGtv�3��G]�,7և}Cj(�!M7��$X"�"ˉg�}�h��>����;T�)#EQ����f�1���a��V�S9駟8�,� ^Siٕz���>����ݲ_3�
[�"s�&"C
�G��E���$����>�K��k�fp�b��T$���9g��=i�V��`+ߦp� ���3��;IN=�@
��������x^(���*i�<�2'E,R��lR(<�����,=�{^/|E�8L�LQ
�H�	:$�<�U6���0=�aj�[�u֫�=�<�2���W�ȼ'mڊ���[dnx��}�UY@��a���ݒx�{�f�H��T��4�cÛ\/�ô
�=��H�e���/l!c=j+�><Mܗ�A���8M\�w�(���/�#G����BР�XQ��Ўw�^;@�~hL���iW�T�J�{��߈��e�Y�J�n�*�YI�Fɇ�H�,��	��(���s���%6��Z�*3��A%N�bH���Ee�b�mi��@��$��xed�FK��"6kGBJ�j�,}����f'Xed�UI�)	%X���T���%��ܰgB�ñ�Un�;a_���IBXOm��Ik/fi�{]��Lk�gJ|��i�P���\����fw���g�<NE�4�o���17</������� >�H�6�X+s	���17�,Ɉ�"
�StYP鲱��A��/�a0I�@͔D�LO���xcQzY(Gq��V�0���;���Z=ŝ�蝽F��.p�.ϑĩ��kQ���Fpõ[��6�3*��&1b�L���@���t���DI��,�!�F�CqJt�����رl=),�	c��J#�"Ec������c�� !sF(�i�<���ᙇ.�O�����'	�NX�4]�'�u)6�>�Fi�(M�I�4i�&;�4������I7�1�t�F���*�x\*�\�H�ǘ�nXB;���ht5����̾ǆ�ii� ś{���We<�/� 1��YS(���eN�7F���ɗ��72��{yk�o. �E�4�P��N�g�EP1��!l��v��5\�ȢqѠ��h���>���ƵX|��UJ�<D*� N>��d��[���bqi��Rs�-��V���q�F��������d	b�Dw%�-_nxB��n    ~<Νt]�3�����_�O/��_q��~R�7uDV��ih�P��"�"��֡�1J�����+1 ��� ܮeJL5�I���<%�*Y�c�<=�M@�L�Y��"j� '38N�k��Ѫ�!�5�ǉb�	�:�Yε������BWA�$��Ɔ���4����6�~+p	ZÕ3nyóRJ">��S_��p5�~��U��l�McȾ.5QTS'������{��B��@& �Q*k
���G�=�3�ڌ{<��y��}��Z�HM��x�>\]MƓ���?���!8���oN~s����K���/D�j�!i�d��1BQ��V���W�4'�Cd�Q`��@�%%�� ���fm����{m����fYB,�tDF��g^�ZK�����ƃ˫ᗌc�� �6jv�ۀ���l4`�%Y�41>:"��;��yr�߫�1�BN07�A|����:1����=�"L�S�<Ox2�yeg� N�V8%̞r��Be�:�K��6��k5�UM���Aݞ�1WE�.�$�g�z�؜���N���yp�᪼1�8���&����sm�S�ӢD�v�g��K�����b	����F�tp�;O���5��J.ꓨ�I�ɘQUL"��"�H8�mKߗ
W��d�	& ���y<�ւ�#(��ь�^�
߲Q��z���_�QQ�>9��+�#��Rinu�p�����ؾ>m���듮��'�"��f�I�RE^�S&4}z-�$��Or�tO/X����dF�Qy�B
�*��h��Z�Im|j�T�S1Q��
�'-�EY�9+1��t���c(��@K�91�!.��ʛ�ty���U�o��+�g�N�#QR$iUzT��~a�e?����3^k�4��������p���/���3��S���� ݾ���{��O>\t�1i}�L������ߙ~��/n|���(�_��I�� �l���f�ro����h��Ek���m_m����Ï���ۥ�-�_(��?�W��v���ɟ��;���N��N��������wl�x�U�i���ؽ�����&�nߟ���{�?�2���Ok�žiZ�/���(��O���{�Rc����o�J�Q�����U%��y�x�G���Z�`�n�S��7^����.�_�WÓ��������_=9��4:E�����5����irꖩ�p�ן��~�^?����`�U�8F�=�2j��[g4]���ڪ��45p-�_���i��\G�:<���E���d�/�w����co�]���z�\��ǣ�Ww���t�a���LĮ^63{���8��e@�>{���@a$�K<��8팅:�=�3-P�_tr\Y�y���_��ڢ�'�vLmËP��j�/�i�م�\L����l��"�[h0ta���}r�-���D��qtus�a�-���x|3��@�j75IȪw>y?�?xs���/(6�a�ҳ��E���]�����O�3-]_����������7�n&����'��A��Op���i��F��1�J���.�������h��i�#���ۻi��_|�������?�����6���w�N��� q$a��Ǐy�;+���c��?��F�b���.��wt���pW?�v���w=�'���?`0_���]�t�C�y��x����N�+�VQ�3�8������}3��+�]��Fq�+zU H1?Q����)Բ;U%�U�'�ڟO?�B����G�hϧQz��|�9���Tk��F��C�Ac�O_������E�hK?QY����t%�w�*r�"O��4:�*ʴu�AOԊ�\^����|������'W_kk�|f��3��њ_H��v�@��|�hQ�ӯP����h�����`x}3i�Ȗ�|��Ze�~h�}~�S�z�.=H9����li��Ҽ8��)����'�.��:�qSJy�*�<Rʧ̈���U�:+T��66ı��«�Dc�dJ=%4:���N�>"��!�s#N�l�����@�w��qJ,�Er"-���1�d��4K'�^Ю�<D6&pY8v��	�.�CGk�dy���6J�ԭ�Z%�h�sL,�=b!�����*���YO]zx���F���Zˤ2�"�Q^ДK�)AF�RF���$�:��tֺ$��k��druMz�p.�?��4�\���֌G�qI\�Np����(��� ��'��g�� �+��h	��x �*Kt���"������m��K�f-O��ZL0�\���v޿/#�/W��*���!��cT.	F��X ������L1J%�9����ϔ�
.�10ls�mȁpy��%k˶���{��66�*,)��FDbE�x� ��e{uB;�}Wǲ�S��3����>�*�*�`�p'J-X�$�50nIW�ח���լ/d��%<���8����R�4����,=�z�*�FeU%�Iw9Vd#�� raBPtg���6�ˮ�>܌.j��-�h�xb�\�QN��jv�y���`���U��>Uփ".�Bč+�MPy�=5^��"2S�i�b�d�ݣ4") ��a�"x!@�sj�� ,1;�ZbS����(��I*A��D}�ćg�yOK,�[�Ķq������r�$�"�q��d�%>K����ĮSg@Kܝ˩�Q��D��ĴY��X������7j���x�NK9����"��k	�C�� ��'e}�ذJL��x82XbM�yOu���%�}-��N86�@�c`D2�I���b�I�T��XHR<�غ@��(�LI�R)9�F�F��UE�R$Uə�3/\ʞkWę���U6��ǗsKB���b��X�[r�0�}b�2��J�	����.��8�1R���HTρ��9x(�1��
��
I� ��h0�h�{M8޽ܬ\]Mr��f�G�b��`�����%.��-^2/2��oƓ������v�X�w-x��"f��">$C��2��lcxw{�p��1��l��
�|�~t�C�"q-C�|˽+��|�]�R�8�^p�l0������Y���=����'��L�L���}��&�=�>;�|�~����2�Un^���F�n��q�!��8GБ9��|���P.�g\��&�'�\�_�ڿ}�}��b�@x٭V����������Ǔ)7d�U��O��9��5~�ݾ���]]A̒5v�v&���p�\+�Xk��?f�-�n�~��Lx�����/�I[ݲ+��Ö��@QM���p�,d���`��!Q�<��RTy�}Rx�-R
ɤy�-��T������1��CWDr�H���KH��Le���l�ŦT�qd��J�M��R���3���\۲�|�2Z����6�"ܣB�+��D-c���m�=�E���_)�N�YcIQ�y�%�I7؟�M�����8^���� }����E��pz
U"��\"�r��𯲕QXC��0 q�V9$��٭��<�q��}���G�k��jX�&R�D�E Y�.0��Êa9��~���Cڵ��\�(@˙#�Gb�3��H�C���`��kAjjHqn����D�I�X2D�Cڈ'�k���JP�T-�0o�Q�[Q�w���s[�CѢ�$0jg,���9��!xgٕz"�O��	q*��<�5O���*E�.�S�x�-Q�s�t,�m���x;�N�'C�n)W�} 9�O'��}�#��{^�t�(�u�0�@��a
q"�w����꾉'�/��Zb�	-Re"���K��Yk*����M��E1��9;�@Y�J$.��a�7��	Rڊ�C$� ����X��"^Eb���%p`�U��T�Pų��ɮY�g��J�UK\%v�_`$N��J!dXq-u}���"������"^I/D�Ș��@@o���p��l��0,�����}�W�;Sc9qLf�*4���,q_�	�g��ñ��F�<����\��������,�X�=��XbK��2$P;OB̙ Y���J��Dk���%�K<��$��x5��l��>o�#V�d�
��,�aX�=���X���&/��+�5�D�L�	    �Zj�%>8Kܗ��m����W3v)x���ib�W��sҚ�^3v����WkٚN&E����k���^Y�b��/�k��o=��(Q"	�⊖�4m��17</���A�� �������(�b}`���!Q�--�:�*)�,l�**���޻#-��mX� �Y�ߠ��
��1��~cnh����174憝37����(!t$9K�ӎ����QY� c�~��&By���jA\ҁ0mh�)���]�L��F�3I�|�ii� ���[���Bc/�F��>���Bt���^S4eA�\��1Z�4K�`Ծ���������x�p!���w�sA�,��0Z<�Q��1��� �6�b5\>��C<����5�zf�	õ� �mB�+�� �"�#�MT)��d1�t�n�
��a^*%M���|��H�Z��2���1���Y�.�&礄UŔ�����8w�u1�n���d<����i�B�uz9�������B��K��m5\;���%-(y0(�T%�(mG?Ͽ��	���]˨�'?�\�}x�IRа\��%WFE��Dé��YO]jN���-U;�1��8�)�^�(���.G?����{u�5*��2$Ww:ĐmV�nas����J�D*�	� <�����1\���>t�v��DI�<	�i�yt^j��=���K_{�	�� v,�ߛ���� ��A��:ȼJ����xƈ3Tn�.����'^@h���Xa2:e��ױ9Ȼ�����	�Dt���!�gͩ�:�6F�A�=�unN�D��8�I�q=�T��f�A�.\��K9��N W�d�xTEhP���j����gl%f2��0�;-�N 6���}Yp�SBh���G�/W\�*����\U5�j&�"�C|b
D�ȜU��o���R&_ 4����\���7�~�����w"��M��$��1e}r�R�$���L�L�a�����V%��<i����V0��?w���ZbѦ<��q��q�Qs�w�� �x^u��8k`l�&J��J˃ֆ���ہ��p�ޣ""�%Q\	�����p5�~��	ZA�u �@��w�� �uf4�%����ϵ7 �Ѡ��Fj���E��L䖯��c�YU3�֕RA�2T���|pJ��zT�����W�/�\�o-i�<������n��=Z��7Q���xk,��0����&��=���)��X%����<ۡ��T��C'Q��Ct��7�^����N�8tP��Y5ER�8�6��U�Ii_86��w��PX�l�v%l��[�7�GU0�$B�0�s<�*HD��a��h���f~FO�i��)�JT���_�P1�S/�R$�� ��I{'ZԲC�W�1�*����H�)nVR��̔�8S�C�j^�v�:���7�� �:��LW��c�eT�@�f���,eXr�mkd�{։�m'T��1��H�)p�|��x�d3*�Ũ�-zj��:�b+}ʔ!s#>cv26X���cT�>�>����X�^�>�J�
�*�`� Q�dA{���}5�$��Or�|�/W�d=�P��if��m]�x֊��>�}RM�v�O�R��E,\�$�M,�k�z��}�N��s��dj<K
j���)�P��N�����xZ��S⢷JZ�Y�3��fJCV�Q�����1C6C�t�~�.n.������ԟ�L���w�t���ݾ3�~?�p�ݟ�n��2]�x^����~g�����y�u�ϣ�1��'�j��#��K̛�˽%l��ywy�uw��u|�uPo��"?��o������w��t_���o'Z;�(vo;�j;Ѯ޾;o��w�}�U��V����b��J��j�̺}ޮ��`���N>�iw��ii俼cߣN>�c���K�����u+F]����T�X\���M���j��'���G95���b�\�)���:���(���t���є��=P4�_I�
YcY��9�dN��C��v���뇳T�:n���Ǩ��S.љ�ws{��?��V������hi��´��N+���:D�����.���'�7�x��_�W{��R������8<��������s���f"v����[�����-���ӝM
#�P���2,���ٝ�h�BH���������|�ߨ�Z,�Q=��tj^����oW�M��.���b67u�f+��B����`8@��U�f�r��������e��T������w9���$]��p�����7������b�`�&�(=��;^�	��U�n0O�d.8����N9o?��޿}��O�f2�}������$;ܷ���$u��&�#����1����<�<��k����"��n�a���&���&�O�'G��|��'�]Gí����@I�����E^���-?��'x�����Q��X��K}����~�*��O���U�������K�~����|H�"O�o5u���	CBb��*
GW�?���o��t���c4�(�|E�� )�'j�>4�Z�`���w�J��|V���W�CU_�����4JOԜO��4gZ��j�؁ֈ�s�9h��+ԘY�^���m��'*K�����UE�@U��y��@��BE���5�Zѓ�k1���OT��@ѣ������`m���,1{&�7Z��	v�H���� -�{��S���S?9�o&-�r��<��U����wp��lc\T�h��-�	lK"|ʆ)U�\r�["U��qc�06nSz�����l��o`g�N:�
L���Ĉ�)[O{഍�l���e-E�c(F�7�x�mʁ&�L���nx�܈��9}��u{��vN�6d�� �8ǽ��&fH��%�2�kڵc����.k��2<��s�h-�l ���AFzڬ3	�h³P��/�� ���<��س����
���/F`iq@����H����~8=��*��a.]���Z��
�mL+���=��AɕKɦ��_��z�vˉ�`�� X]+#��v[I��V��KTú����G�U�7h���@L$��r�)s�b�ach�U����@�t-HY)8Y|+H;Rr
��ҜyH'W���^�Ni��+�`U#"ckВМe�8�ư��=q�=Ӏ]�*�b��DFe	DG�g�+˸��q��>����m�yJ���O��p��*#�/W��*���'O�4*������g-řbxB��̗x�M`3e��O��I4�p%���(��D�;ay8g�q'�ɵ��"4k'�Ġm��e��s�萩�Y���o4��=ԜoJM����\U�{=]yn���_�����*���n���w��:o}J������z�O��bUW�RW��a݀�e��,����[���jǺZ�S���cI`N�rۿ�.�/5vgS0���3kY:�Ӹ&A@�h/sR)�l�����g�A����U�R�e}$H��9j�ּ��bz�uԇ��E��e�O�k?����^��9/p5L�~C��N���qa"n��2(����TdBfj9�Z�ڃ���e	�WS<,'����վD�Y�G,�����˰ĺ�@+0]T(#�Zp������o���,1�e���>/�˰ĺr��� �B��&��9o��bm��a��y�����[���q<�K�9��0�S��}����Ģ�%6o�'�����'q�R�U��tړ��,�c�x���/�Wy}�t����%)T!����Y��,�~,����9w8���ڱO�PB�@z��%G���Y�ð���Z�jj�F��L�g'"� �R�ך�f�{Xb���7���f�l�D\�Y�2���4/V���k����k�����Zk�Z�p�R��F�I(Y�ɢ�L��k�O�.����c޵୑�* r���)�*9i.��\kw{�p���M=?�2���G��|�Te����g3���	fct%)m-�N�(|pkl���׋^�ŕ1IOa�a����O�7���Ir�1�Ñ}��ɬ�p��ER�wS��#x�9���Im�L�`����Q�~�\^��R�~�k�����ˋ9    �e����yP_�ӯ�w��O��e�7?5|�D���	I��� ����o$��(�=��∹V|�����[����藙�v#���_:���� ���f��SaD�Ha�X�,	6!�i�&��K�F�4#"2YT���;�X9 ��IT8<�QM|����B�qAc�����RI�N]ST&!Kp;�T,�E�#r���y}eUZ����$@@-9G-��zژd]��%Ľ�C�[�$:JD�Up����p���
��@Kq4=�t��9��cnxXmk��ɀ���	X����am����RFC9h�΁��#��r�Y�Ymmcn���֐�2nN�RC��4-��7��17�VV��pN�3�aX%J{�xъ��am�����&!I�J�2�D�"�d,u����^,TG�;鈗"�W�R�IC4�|�E�+�Q1K�A���>c��ʌ�3�b,(%�Y��ڥ>oc�xS��Tm/+��Y7l��4*�"qLSB�a���A���<,�[�<�)
K�S.�(rb\s��������]-��v�ە�u�V�^�(ĕ�*�i1U��xo��nX]������Rc,x���c7���^�=/5=��Զ9M�29���\
���|m5�!�n�S+��jj[I�����$O�0ȺQh�̦�B��a�͞��p,q���וzGB��+��Y��8O�&��s|p0���*e�p6���9x�Ri���Y�č��1��,��uϩ[�N�b޻bm.}RN�&�Ro�WSV0E$�,X��H��茊�Ϣ�f�w��U�#W%���	Ŕ�'�Q*|�х�,��Y⾬����z9�FK��K�5��F)���4��0,�	��š��.%�)S�������wj�d
I��2-`�] �[+��)$�"�B$y&؟j��+�4cr��2)*���8܆��b�ҩ��`����0��@΃b���uQ9HKKot*Ͽ�Һ:�G^Ik)�0r��)��s�y�F�rH�֓���%� Ci��s�D��5:�C��m�e�%�b&	�y^e} �G������h���P�vIFa/��A����S9d��`�� Yk��>��F���T�J�Sit*;�S���N��Ť"'�=x����}$�J˔	֤E�-<��PHHNx��y�L�ӝɣ��h|v&�ӕ�a���o{:�$`�+��B�Mʉ&�bJp&�k�{c����|��}3!C����y���BQCX��8�q�Iϔυ��!�����	���r��Ґ 3#�Eedʆ.Ϝ]��r��ը�̉��������<����q)��*�,-�`ƹ��'M�=ٲ��V_W5��I�"�U$bt��Bݹ�=��'p��q��b����d<����i�B�uz9�������B��K��m5\;���%-(y0(�J�Qڎ~���%*rEn�2*fi/���/p ��W!�"��aI ,��xΆu�8�Q�����R����hܲF���τ&NQM-07kcԜ��CX��<{�ezTt�`<B�J��ɚ6'+p����$S�*b3�Dg���ظ1\���>t|��("��/�\u6,�,���&^��*e�Z�_��o�|����7��m���J�
�]biH�"S�Ѧr��,�'V��O(o�-���o�+s_嶅�t���tw`�ZXY��5�x�Vn��Q�aF�m9�&�s���o�*)��"RPF|��ho�f9�6׸�o�:G2@G��M`1��|�Ȅ�ݽ	p�C��0�Kg�e4g'���P+�K��z�M�)YFn�H2�Z�$l4=���k_2�#��A��NϿ7����Ϳ߃/������)O\�HHE#�;�YvY��h�����$*���Eo���!K��[�y�dr�x.<qIJ�����1j���!d��RѤ&N$�?���J-�C������k�4��Z���$���2�(�1\Ϳ�>t�BErNd��d	ĻH%��Ē{@w��EPڤ��9{.����k��կm��j�<��x�Y��k��=�����ƃ˫ᗌ\����7Ͼy�{��%�y�hI��H8!$�"�� "+ǳ2.�j��%"U�$h�Ir�K�D%��'�*��jOE�*c+rKlҙ8��-�{l��q�^�)�j��	7j��f\3P��<���;��'c�l�wۧlz�νUycl!pT�M�!D���D���E����F�_��0�X��91E��`G���[a=WҖH���Ԉ��Ī2`<�)x'�a_*�����C33λ$��LgUxO͒gB�i=�:��s�$�Q>�#Ul������so���,E���CStH�3'�&eٳ�݉5�WJ�r����1RzVƋ�4��b��S�s�N�yA'ְ��2�6h� ����u��kHA}04�$�x��H�푶�4j�� ���sKd��X0�$˼�"���hF堍
߲Q��� ���1*���z<�@��H�ق�dY�2&�hӧעOb����cl^�>�	��>a��x��RQ��>�}�[�'�}ʼ�O�|��m�R*J�S�PVr{��\ӧעOj���}���O����MW�2C��VQ�a��>ݗS*��~
)5�f��e.Q�2x�ke�E��p�Ž��QD�ѕ�>9���gȲ8�~����;f(�f8�F�������p���/���3��3���� ݾ���{��O>\t�'��|�L�
����ߙ~��/n|���(�_��I�� �l���f�ro����h��Ek���m_m����Ï���ۥ�-�_(��?�W��v���ɟ��;���N��N��������wl�x�U�i���ؽ�����&�nߟ���{�?�2���Ok�žiZ�/���(��O���{�Rc����o�J�Q�����U%��y�x�G���Z�`��I�#�<N����|�����'G3��_�g?]�tr4�8<�e��WǣB֘��:'�̩[O���_�N�yz�p�~4���W���5�x�:S�n��t%zj�~����]�4paZ�R����r�!����N{���ϓś�
�x��/�+��uv��K��r�b�~Z\���Gӹ��Kg3�z���-^���������N����.����?�����t�@!�O~��qe��e>�o�~-�k����?:�/F@q�������f�{p1���k�Ů�pn��Ѕ�r0 )��[�2]	��������2�[*����f�;���nj�.����������kxu��A�i���G��u�/ʄ��M7��~2�i��J���]x������p3�\�>���B�~�����H��:�_	���O���P�}_M�5MpDp~{7�0��qt��x~���#vr�҆��Ͽ����[)	cp>~�ȋ�\��G�o�!��0���|uY����_��/P����ۺ�������/��U��I�%w��S�)_�I��Voغ;I�=Z�π����z��������w=t�V%���X�L��D��҇�[��T�������j>�t����o�]�BbE�>����?<���~��#v�:��j��}z>��TFl�M�.rE]����oƇ�,q�k]�;�yrǠ#С���W�(rM:=Q+zry-�����(z�7?�\}��5�&f��Fk~|!яځ����?uO���j��V�����7���ly�W��\9gGQ��svpY�|���ǈ,?����|�QĐ��=��Y6+����|�͊ݹ�N�
'�̲�Z�B�$!6�Lu��66+���R{M#.���o�$EJk��LJ֣)��Gq:?��1b�ǎ�jgR>v&�[���a�w�h$���xLPW|ZЮ�<D��^�x��	�.�CGk�dy�%�@D�4&u&�J�,���6��/9O:7��l:���� ǋXZ���1�=��NO�J$~�KDW����A���J�(����ffLd��o�W�������_5Xׂ�װFMd���� V�|�R������A����Vpp�(k�Q�J%�$���p    �~�+>� ]RYCj<xZ�p}�Q��c�
C:�����u�H�u-X+%�&���5Hb��F�9�{�߷�B/�o�no��xr5��O���@��\�~�t��{�<� ����3��9�hY(��C�J��x�}D3e�b�h"�:Ou�9�X�U��Q���Q<�Zٸ����@�l�%���g�H���.:djw��z��t5�RS5��7W���GOW��)��~c,����4��ۮ,,�]&�Jo�]��׳� �7��ʖ��\ހ�e���`� }ܺ�4W;��:�����X�e*��!���u{�������,S?�U'`����
µ$|�L�^Y����RY�����,?�Uu�(gQD	4���Ks*^�=���]G}�]�.�[����Ğ���<����4��W��t��m��=��07�L�W�S��@�,�Y�{��ʙ	j�X j��>�l�	 ˆ&�,�Xbz�߬%����ΓS�mC,���Y⃳ļ�%���Z�ʏ�A|�T!��H\
!g�<+}R�����`����U�*�!GN2.����������x��/�WFVhp��g���0�s1-�x�x���X�*�/L�J`�	G(�Q��E�)tk���%�}-��	�_�%��v�� ¹d�$��%�)w:6K|��зi�],O���8ʉ�A(��L�P��r�$a�("��<-&i�����kYƃ��.f�=�V��CV�Q����Hp q�� �2��Yv})�1v?c��9ƪ=�K��+QD�q�l&�k
ꙋ�A8��b�ru�w1���f�ւ�հbK�'!���ВK�(��:�k�O�.����c޵���b,D*��F���rW6�w��7�������"����%3@�>�>+�#
�1���1Kv�N��@�|��K�� t_�뚱�z���1����B�q�z�o�Aw�s?���O��*7/�Wd�}7���8����p�#�Ȝ�vκq ���������*�W��o_o_�����^vy�e�:�zy�z��d����~�S���aN$������?��+�y�����m�3E)��k�k����l��ߏ~�	o7���3i��R�=P7��j°$�a�����!�J����#\X�T��RI�*�Tr������)�١ABݠ���R�$�8C<O�d�n�I4�8=u�6�ZR��D��AgKR�Lʔ�K�GSu���ʶ�S��ax*M�$� �4^��|Xo@u�!��j���"�<s�5���� 7����T�R�-@ko�x�����6����y`e��e"!�$��@`��ʀ����q�nx>hy���9'��Br�0��_��>���a���P R͈��&��(hpI���F��<��
V�3���x&5��YShP�nk[Ű_`u�X�t�9��S">�H��\�HU!��4c���SDt�i��h��.#�N���R��IdϬ�:c���2)A^},Q{�M���5N���)��%���S��J�\���]� U"�k�U6孧��S������JA' "�[��`�x���-<���}��"�Ny�R��'�`�"WL_��u�8EL�L:�5q�f�\��I�sMe@e���CY+�l���9��El��/�n��#�mE�2�MN�����V�HI-�,�b5�����D�Y�G؝v�f�X�JG�A;p���,K��Tj���,q_N�Vw��*Lg")"K�$����^)eD�r˪�%~�'Vo�S�VL	��Jdx��"*�M*�>���(��[��n�)��l�>��8˦MrF$y�N�%�o�W�<ӏ��AO�K.�R�S�%>8KܛS�2��jj�9���e!��B4��õ���%~��N��Y-QCPA�^��u 2�$RU�3eY���2RRR��P�m�"��G�I���c�
"�Q1���Q8ɵ�3��������������"�7�J��,�h�Ȃ'������#t�ְ�H�⎄�Ii���H�7_��8E��z�.&���CgB�W���%_��+�����\ϼR[  xB_���XϽ���>Z|�b`���^�bY�ܛ`�6Je���q�g���9�_��ް`\�q�|��7N��)�8E�H��=����[�*r�#�ъ�8��ų��L,Yi�`+
bEv�Z`�
��t�;�G�����LR�fZ>@�;��!���K��i�#�e�Fq��R�IGIa�e��:����vn�e ��̈́��^n����uaD�d�h�E�U�\��6��ߺ�6�2\\�g,#͝�O!�� �O�l�n���	���+�s�-�)&<Z�:CY�E����-3�@8�,4YJ�5�rnY�9�h���_� ��,����R(�
�Am���	��x�;��q���j2���u��4�!�:�O�Q��I���%Y	ݶ�T�Ղ��<���[%�(mG?Ͽ�рt�h #��F�QJk/_kd�`P4��h�Y��}mU��(���󦍧�%j�+����� �7�A(
q�D"4���`�Z����C���<\�`�%0jӠ�uֻ�1l~������mo�ܭX�b���L�!m�Ws�w���]e�,����2���x�6q��W)�/�l������ 7��8�u~N〥�;��Q�ThL�68�E��:bc�$2I�'�EK�����Y9�2��C�����6K�b��k���=`X��ŽB�@�!1Ŵ+��1��A�^��K\�$ �DIPwҨ��x5y�ر*�c��7n[XN����%eK��K�3e����l�c"Gi�\��uX'��"6$+��	�z�3B�KB{��&~� �`��[F=�޼���7/�^�4rc/�-����
�|�l��]g_��U'뗅"�PH�G}f���U��x����,�$�������p_�\
'|Y����CYc�%��&��	ƈ�G.��1����^�u��֑�$��୦�"�^���� ;]a�H�qE���Ǜ�Ι1^L�����>0����e�灅쑋Fj�S���w���F-r=*-����B�B�j��꿉���ƃ˫ᗌ+^����7��������ȿ�L�"���b�3�8�`Yr�I� ��nx��!�'>1Il2���hq���dR��%�dt���쀪0PRi"=�`�]!)��K%-)�� �6N��k��Ӫ-�)<
��) �$�s♛��	]�~\F�����?>e7ߪ�1�9�����F�6у�r���9{X�6�x.6u���q���Y���)U��i�
����˘%�h�3+�#�5��/%d#F8"����)QY%���{IF|ə8�I���\ҲCy��#�90/�u*�����"ȃ8�3�R�b8��%PG"yi�R������v��j �N(t�6�)�+FZ���Yy-f�o٬@��}6��lVd�+Bq���KD�T���(��(�ؾBm���%+T=�����8�#"��B�$o
�ZJn]�v�������4N�ɉW
"]͝L�����jJm]����_�B�JWB�xDo&^�D�g�]%'�Y��/��i
��`�M��"���3�g�����u+$m���I4�n�gC���fC�Q�����1C�~�m��>^]�\�ߩ��ߩ?�?8-����{�p�w��8�Q���Ew���t)�y�N������������M?�������d���.1o�/��x�y���]���Q������A����<�����]j����R�q��}�l'���i���ؽ���D�z��}?�y��V��[%�֪;���*�ڪiJ���y�~����-�OP;����Q웦����}�8�����.5v�[X�֭4u}0���_PUbq��'~4���5�Ԡy��l�=qA=�����jxr4�#����='GS��#\@��%q<*d��s2Ɯ��y8��'줟��gE#?�|�?�Qc����3E��|M������-M�EK��.uZy</����wQ��<Y�i�    ��������[g�z��.�/������]�|4����t6�������u?οoпϞ�h*P��j��*N�c��n��LGB���W^��F��b�����ܞS[��b�����nrlv�����6[9��]�.�^M��5"�>��n�?,����oƾ�Y��&��_�;������W���F[�0yD�Y���L����t�y��'s�����t�y�х������?
7�����L� ��'	8�ᾆ4莂� �c��0��\�!U������]�G�w����G7��7�:?9b'�+m8?9�:�e����W�=���18?^��Ϯ��y������K���E>��\���7����]݆�h]k�z�O~џ�*`�떻�ߩć�/�$��V�7lݝ�$�d���g@ut��=�?��f|OW��:FK���WԬ@�b~��a�Cӯev�Y|��O�g�?�~�����R&��v��5�4JOT�O��ThZ����؁���s�9��)�#Χ^�ڈ��� TF��L?Qc����&�w�/r�"O��t:�����W�,rM:]Q+�ry-���
�(z�7?�\}��9�'f��Fs~|!ѐځ����?uO��p�j��V�����7���l��W��\9�F9��sm��
�-fI�DY!2J���xÜ�"����$a�z\2U��&-M�Y���(�Q�Z@��{�u ��P�)t��bĄd]�ƛ�I{Oj{�zmaU[��%���%Ar&m��!�h�*�B�X�Ώ�{�<᱓��1�C=E�/́!s�B��H��ԲŢ���v�!RZ���׻O�v�:[�'��,j�=�Ao��T�=�lm��_r�t����t�k�e��#��8(@g�c�{`�w?���_�L�0��\��@V� ��+�7�dC�(����Uҩ'���DS��pU�I�������[���93�1��'�j�>����u ���NC�F�2g��9��*��W|�a����4��{^W'�(�m�\d�1���khm/T��4\�õ���8��L�U�,��.A,��h�}�J�I)���޼��jԝ\��}�$��V)���>y��Q���3��9�hY(��!T2�dJ���3�i��R*E$�t߅x�4�`U�`^��Ǌ����P%c�ƣW$x���]Oc������\/zdjyڻz��u�RSE��7W���GOW�����~c.����8��۲,l�]F��t�SI����׳� �7��ʖ�������!{�EUR0q�2����r��i�b*�H-f�<Q�2YB����k���Rgw���wF��)6u�ZH�c8�S3�A����ۦ�ϩ����Yi��(m�0*P<8P+#p]���0ˬ�n����7���/|�BZy��3�~������q^�j<��P��q'�Eʸ07�M�W�S�*2!3��f-v�FVɳ�����'n�(T����5[�;[����b��D`��^/5�u�Wk��)*��|�f�{�b�����8 [l��K)D*戕���Y�z�i�����ŕ���"��$p�	�*qFm��O�����b��k�fm��d�G$���"q�(lr��)�k��[��l�BU�U,i�"NE�T�'o�{��-�a�e/[�N��Q�jQ��Y�"!{J���xE�D�c�w��O��{�Ӄ��|~*G�x�(�bo���	�
���rp �xbb���eL�0��n+ßuI�>c-O��Zj��ݑ�#,D
H�S�:��zF:j�����U�NǬ��`�|"�f�K������ϗ㕫��ˢ��4۵����Z�����AQ�p#�N�uc\��xru9����.k������M��&��-�N��`�X��~��m8?�s�b�f$�N"+�$��r�Ĝˮ���3������(WЁ�zǵ�݁�k�T��FQ�4A�5�Y���̨�GN{�o�iw��h7��)�Y�����̶�t3G�2�s-�3���8�w�<��4��8Y���������s6��nI���,�@�_/�\?�Ly�;��o~j<�8̉��2A���wAt�|���ێJ�3�)��kk�����`����/3���޳�t&m��A�:��HQ�Ir�X�"AJ���%�_�~��A�ѭ�C�31�b�u��>���*��sP��~�'�QI��њJ&2D�4����s�׶%g����/l$�J�<K�f٣--i���f5�U��C��T.Jo�r�HoD��A�\E��(:@�K��N�X�}lP�sxYP�-S���2W&��S%Y����F��L�VyKp�9�2dw]���J0���ntψ����=��1p��*���F�GLu�i,Dj�HpYE��P���F�g\��mJW30Ms��b�i��Ƹ��=��=Ӑ]k���%(�d�2��Rb	0�Z��%S�,T�� ��x&0'Lgj,T.ѻ�ͣ��h|v&�%k��:-�t�T�	h���SL�F4�Zz�Q��dX��[k"q�	pou̴D�B�kl*o�ME�������Tt���,;���-ʒ��s�)��t���h���r�Y��1s�xE�UL�ON�-�����]!l*���f0��:Ǚ!E*���m}6���(x����)GL�Q'9ߦ����g�8����T��lƓ �VpI�v!�`}pf?r��R+�[dSq����6U�:{�Tđo8�Ř��O.���2[m�m���*�C��S4�ѱ@���+0�\6[|x��/��y������I�9-���{R��$/e��/>[�o9= [\ͳ�l�|����(-���x6[|p��/��}�{M5�Qh��[K�P�D�m*��+a�l�s{f�9 [\M�gD%剣L���޻77v��_E�T\�u�ǜ�N���J�$���}�?N��ڒ�")�x���ocQ$A�z,�DI�Ē�r-��n����6R�����OLY�Ň�Me���G�j�'K�o�H<g�hc�I��_�t�y�[�Ŝ�E�������%",�z�c�R��̦���!Ê���J����"���Ji�������Ͱb��m=��ڡ͆�R�.���X�K��yD{˰��Y+j\K����V�[�3.fu��eX9(|e�opDzJ��&$T�\�9��2�$��nX� %���9�H])������+6�lM�4��%oe�Χ�3,��^��}�Jň��C9b�Ć4IZ�P�'l�eXiVZ���a�eX�y���^2�0ZV��^�&�
�D��W7Nt����E#P�'�%��4:%Ƥ1��?�>�3�V u�="a�$ƚR��^7�	���v�y�����\�O���ݏ7V2dc`ȶ�$ΪH �SFX������C�o/G+�2/2���br��F�(��[S�b�*Xh�%qK\Ί�pIK�AV=���|� #3%élFIe��N��Mo�m���z4��ђ��+/9/��z<����ͯ��v4���x2����S}�F������r\=����%n�F�A^�4i�Ƀ�	���49.������&��fap��V5�W��4˝�����&t�UL�>e)�<Z�T��V��nTK��ib�����ArODD@�i��� 5��UME9�C=q1$B=R!|pf}AkT�xUP8
�H�|ߕxka�v�K�Am�W��;�n��(k��x�qF�͞��mB�sBDQ/Bp1{�Xrcɍ%�%��Y���f5���D��Py�!�@���@4�P\2�\K��;���V�94`tq�()"Ê�)N��k��X�0��t΄PNs�u�$������ƒ��W�t���C;mT�xId�J�wls�K�v���T���s-[�7�9��=���!N}0�f�s�t 餽P�qfK��ZqFk�G4-4TNKJdÜ5��>so�9�u�3�V^t��o��=|�6%���9�D��Vy�3De㸦*��F�%	5*��*�JA4No�h�N�F�w�`���@�գ���H9%)�w����Aj�
Cmq=�.��    ˢ��{���6��%�l��	�Z!
�)Jp��I"U�n�W#�;��^�L� �ۧl�Q��0AdN���>��e@;�SN�TF^-�����?�/Ͽ��р�>��.�R��B���(oB�7\/?��r5?6~��������}�J�~EG�Q�lS�Ī`P=+�3-�>9�i�%Er��q�X�DPV���*�)����f�(^%�H��q��M�� 5g� �6j����"��x�����{G|�Fz0�y�l��>�?+����l�YE�r�oy�16�r�47h%��Z\� ���gZ����Sn�c1�đUAU�p�@��������vA�f�^cr!n��r6rb
����eR�d�Υ��张z9����ZQBI��@�J�8\�U �R Q�Q���Y�vRG�xt5
R����Q��b��l\jj嵨�e�BO�θ��T+�WZ�:�E�l9��L�A�q��M�^�@����~᫗,P��(���GZV(%�w�AP-�&P�F���J�&P�@�J�\I��ʊ,���TQ�=�&P�E�T��
��@��'�!�Y��9����uo~5E��Β+.��;k�DN��ݮ䕑���j�Y�u�$G�x)pk������t�������(��*ϯ/.ǿT�E������z?�w����kw����'������:�mӹ�gM�y}��L��	ί����Q�����J�ܡ2�w[̺�ݽ-�[ѽ�M�݊f���/��>��ˏ?���V��[��ӿ����~���ɟ������X�gѬw�����ʫ�J<�+�^�hvo��r��.���g������L>A��Ӻ��٭��|~Ͼ*3p��=�_u�]H���J�;��`ԍ�8|5�A��n�p<���l&ָ�R�E�4�S�y��<��$��Y/O�n3� ?�4���h�H�DEТ���0e�F���YZ��-����/e����8�$-��A(�:.{<�@z#���t�p�e��P5x�h�>W-�V'�ǳv]��"ó�w�;o�����4�����[���]o��}�z�\ܸ,�G�������;77�ُ���n���v_�^o��|��D�	Ul���<(�ZBJ�No�\��e�'������6�wԼ��k1VO�r:������	�w�c7o�qp>A���n"��\�q���rP�~M�]��4���������� \߻����	y�tS�t^�Q��O ��^_�Ӈ��M�-F�<��]���y�����&��3m]��	�ݏ�����_���=�/�>�����~3�,v�lGt�1��q�?�<��R�K\����G�{M])�>8�F��Wg�>������>���u�����k�Q���J���Ǐ�i��K�`�1Mʥ_�/p���_K�����+Ʀ���hհ�q]oV}�70�_�G(�nXV���1��I�՝�oػ��Ē�z������F�Opu=�g(`Շ��&/��/�Y�
�VZ�|-z�S��;�,~rv��gӿ�?[�����o�_!FbI�>��E��M�~��#v >���奌)�g�7^�؈��� DF.�L?Qb����&�w-/r�"O��eʳ����.���%Y����x����}�����ڒ3�{b���$��b��:9�A���oU]�"�ϓ�������.����.�������O�0��Lq�2�Igb�r$Y�AX���E"����Δ��|֖?�yHw*�_��p�CJQ�PJ�+'�%!^9g��l���I@m�<$[�/r�@->�Cl���9�d�`��ї��s�8�|���c5�ZI����
,�Q�H�9����kB�,�Y6�5m��e]�\
�"�ą��W(���,`m�ǟS�t\�ݻ���C �G�mˢ��U>F����ק������M��]� �M SM Q�i��IF"�25�K��X>����}ع���f�RZ�̄r&D��@�8�n����q5l����'�FF��;˘R6{އ8����Ͻp-h�����5���5)U�JD��h�����
{���G���Z�ޱb�D�����f��������Q�����ѭyBƓᨫ����y�3��p�c%��h�F%�w�c>)����3.�p禍i�S"��T�*��Zj�#F֗�rM9��R雱�a��P�u�3��ь��@��̗e4�1�6�9W��j���._�%Ý�ٹ�j*ȷ�sY�������n���Mo��{��R�Wk���X�t*O'?���9�ίn�B��>_�V��V��B��a:��2�I4�KYǮ��v1E�SPa˅%6���ޚ�i]��������Q{bb,ٓ-%�#�W.9�$�B�(4�}Ph�����������\�P��	h��kA����vO����ף���IZ��22W0J��ٵ:+��p<��P��"�l?�ʃs\��7ɦ�
j@8�ҚD-�I�����yh���2�U�&��E#�.ޝ.V{&P���)���]`l �A]�d�}T����ż�.�oU��1�����!�,���24P���C7]�C]��L�/DKV�S%=�>S�p��ILʱϦL����Ţ�.�oWW�A{�|���Ғ,�ʐ�Pv��M?Ao?��K���6@�����0㳨$������Ų�.��? ]\m�Wx1��X���[A���s�x߾����\��7!�S�����\����HPZ�#ñ��A��ਰ�AK�k!�s*�"ß5�E�c�h�j�.x���J�#l �1�7m��VW�Vק��9As�Z8�] �f�9�b��þa�ӏ4ݵ����"��z��2	g�
¸��;�p����b�?=�]|�����]�En�%r$�*��Ql��nk7�Ź�|��
a�ĊV˭�A"��}�ޗP�P�(ZNG�D�N�c�\$Y��{~U��`�~s��X%-~36�9��;����3��X�~���yh�x_Jf���t3Gx2���R2ˌ;��q ip繂o��\��,��R��__�q>�f{х��~����ŕ�ˏ'�<�]��[_5|�L��/�S��z�Eװl�L��\��S��5s-#c-��_7�-*o|}�������w��T�r:���ջ�U�}EKl��(=�ODg��5 �-y�_#A9Q�#R�,z�-���Ŧف�sP|���4�:��x�=R�v(Q�� ���9(Q�E*���S��,�2)r��4���f%kDQyH��S)/�J���F��s8�+ �,Dr��T��J���R�Qn�}�zdM�' X�5O!	������sx&\M��V��R�@ I�G]��b�-���`kklK�ue�2�1Ei��9���vK����ӄ�@@y�8j�C{�z466ƴ�s�/��Z:�qH�KH�oH�I�,�w1m��x�c�؛�4d׊S�����rI�H�KCMH\%�x\4��p��՜�5��"��
��'j��F`WE��4�����D١).�T'�؃_��h�U^Pb���*�=������8��(RA
TjPe
�m��%Vѵ[4���垀B[k%�8������.���s���I��kgoJ�����%��}Ԥ���x��Ut��VM);$g�v�X����y݄vw��vχ�&P���u̨�����n=ښ�3!�~�i��=I��X���7{�TWnl�((�1Q��V8e����՛MrUo��4%�}g*d
R�2�=q���{�⾉U����tq�E���-E������*�'��t�cH�_��bSm��A�y1'VqF�������t����މU������bSyN�fN$�X�1�ɵ�>�	�i��%���<�� J�+Z��!_&F�΄+�M�.�XE�Y]\m�E�)���Do�S�&n�.>]�v��8CI��) gP�X-��%,i��Q��*-������ �ɉ�Q G���̘�8�b�S�K[q{��}����t�r�C*�#��V�D�LZekUJ}Nεd+R�L����a�5�0��!�,�?s֒�<3    ��n^��0ψZ�hRA��ʳ>���l� q�7��C�?!��&i�JS��8ߗl%���:ä'��$G��B���{��>%i�چ�-$��@����An�VZ���l�%[i�V��lE�/ي�o� �� �VK�` �I���I!|���QN)�By��U�&�F����;I�h̴5����ɟ$Y@bH�#���J:�q�e�i��;�<�u�zB.�^�����y��TȶP���'��9e�lc�i�-�%*�E��o#4h��5&��en����NV��;�kG�ɜdLȊ����}�[Љ��\�4��S8| �_NU�t�{�z��R�Q��lIB%oqȢ�=�����q�����w;��d<�U�����D#��bpy�CY9��d�M�ɒ�U����f�4��A�Ynm���v�����M`��&�v=��+�!D�@#�)DoD*i��x��b��$�b�8BB4�����T ����D<dM@�e9Z�Y�F�����0�	�o�@z�1�:���h`c��^��(*F��!G�.��&��F�����a�P
B�'6�R�f�)Z��mB�sBDQ/Bp1{�Xrcɍ%�%+�6fɮ��	��,Y،̚�/!:�FJ��	�$�4�M��reV�ƒ���+�HʠB��,�@�L�Ӥ����=`(k�('�9qAk�ɉk���1l,yKxU�$�����$��%1�4������j,y�U�̦$�U�X�=	)�5���������W�)Ã�Bj4���/�G�����`��[�z�b":9�|Аl��߄�_�����~#�����kE7'�s5��ޡ�H�8�9���|/�g�F:[�%.����BM�p��"^v�`���@*� %�E�E�n����� 5��s9�5�%'��%M���@
�6ư�-�U�<� ��$��D%�r��؜��x5���xK(�as�	�&Tz`��8u���#�с�8P����ˑ��S�R�7�'����ђ�D�RJ�x�Jp�BL�x�M��ƃ����T"^�����o����}8�؈�w����eU�ne������R��������(��ۤr�6�-��+���W[>��Z������;ψW�w�LM��6ʇ���R�"N���@<K���U�ֲg�t���YI���rW���3}�3���������}�� �& j+�Z����Sn�c1��A_!I�%	E������$�N�E�l�&�XA�&�K�b�Q�k�r;*���C(t�8|�e�G�RbThEu{�:YF+��
�P{� j�t�X�u�>e��
C+�I��9ԶW�5oԎG��4��WG��m%�9��0���BS+�V���
��;#�/Q����L�~p�8�;�"ˉ���>�q���غ@I���ZVd9���DY��dC��g�l���	�K(�u�ҍ��U�9e��'J��R("0�(��+�	�A�ھ@m?}�K�j?<GY�u�#�{�iFS��@ݷI}�I�ev���42�����	��o��j��5*4��3�$�.����#�}��	�J��Q�I����P�)�S_����������/��Wq�_�����r��q�Q����>]��m:��I7������?�������=JӗU_ɖ;T�t�n�Y����Ń�c+����c�[��������sÇ�t��G���j�ÿa�_r����=�O�x?�����ٽ���,����Y��Yy��^��{%�֫���\��ԥu���__�s����'��|Z�V4�յ8����WeN>�g�����~Wi�R��1��f7�b�֭�'0��������O���'r�6���(r�eq9�������M���'�F-�M3%��Z��ƣL��2�;�b�X�ÿ���7��'T��y�<��_�Eb��)Fo���n������M������x֮ˍXdx��Nz�������f<���w�w���[�oZ/������/�wwu��t��7���ٍڛ�����-�ϛOw�h:��-S6�ETK�@i���+�բLB���W��C���זv-���iL����7�8�v8��ns��?�'�sc��M��ܠ�K0a�\JV�ɰ����|�8^_}X��{w<�C7!o�n���K�	��	�r���+�u�P~`�����G����<o�^�4�b?�d6q���w:���9{���ˣ[�~�'����'\�ޣ��o&�Ů�e�AW�"�L�o��#�� �ĥ��{|q4�����"��~�c��atuv�����;9[����Y7����ݾ���
�ď�<|�x��_�t	FӤ\�E�����4�8�|!��blʿ���V[���f����Ey��@�eU�;���y��_�����[�J,�Gˠ�Q~`$�W��{�V}�h�2�����Ϋ��(`����ע;�,���'g7O6��ś�J����ub$����(>Q�>�����w*>b�#N���Q^ʘ�/q6}�U���J�Bd�Ȅ�%&\�M`�x��"w /��,�QFp@�<�^�*a����AȊZ���+1���'
̟��ѷp9~�-9��'f�	~Kr�~!֐ځ���4P~�~��P��-b�<9\^]O���._�����&"�e	�.Vav���3�Yfb#�%���F(m^4C˩HZ2� ��'�VR=ׁG�թs��2=^ՁGEP�*P^��F� 4�J��, �,x
P�8����Y<�ˆ	F��+�#�ӚK գ/�����?H��8��bҫ�3�+����V���,Bc����S�����x�^	��]��o� ����}5���6���4�H�V6�톷��=톗���n�vbԶ{�b�j��x:K�o�s�����E^�<�/ؾ��>U:�Q:/��{����o��qQ�����������T+�����я��́�?�#\� �W�C�쩾^(����1�c��cH�|ާ�4-]�ϫp�/gz�p�)�b����:}<?pM���z�(0yy�Y�XՑ�e�1�fx=A����K���ң��٘�Yy�7�����+��O�c��R��#��M��n�R�˟i��k���x3�����-]����P�v��ʃ���5��������W�t��{y��l�w���_a����O��AM�e��~<L�!���ٰ���cR�ヲ
�g��g�]�OPj1>�������5�w������呐�M�>S����[��k�>���O�g��I����o�Ͽ���_^�m�}�{��~�1������S�����]ڳ?�����s�vm��铣�@?{���%�>��1����:�i���Y�e�is����?��>�=�_���W��^�f�Vf����n3����C��R����g�mP���L>.�1����t��ꫤ+��z:��J-�</�����t�lY=�����������qe���bL���xy����)L�T�B��ץ�	�U#��j��g���u�9�QbWٲ�?$�`&�-W�l=I��|гz�t�g�m�����8����8G��o�	x�������4�������LFe����߮ϗ��`�v�A��G�9�������F�������e���gR��[�����&
�ʱ��Ǔ��V�Ms3n��ր?� <��>J�����L���r���K�f�-��Y� ��<�L���"a8���?u]���V��h�ݏL�?փ���A]������z<��h�����h[ؽd���}]~�QO�{k������U�����nV�o?���?����龺�烮�ݱ��[����y��|pښ��4�����(�%��� �>�QDY�S��z/��w�H�2��-� CԆq���"���)M�#[��MOn-�z\L�Q���?��8���H�������)���C�zV�k��(�d0�:|`��.��@�.���G��Fꉧ2�������`V���S�~z���G���j\�'��L�d�Dk5�:˜6ǵ��&a<���C������(��$�d���h�    [?�?�µ|�a������ q�g"�9hfx��B<�t2���?��G���j+\��Dj)��l���+����� ��'�7�iȮ��[�D�w�jaf"��qU�hd[���.�����r���Ǔ!6��%��F��"P�
*��?�|R<%,��TM�S%���3WS��6Q	R�)�".�$�YE�e�����.�Ù�6V����Dr�YÅ���9W��j���._�%Ý�ٹ�j*ȷ�sY�������n���Mo��{��R�Wk���X�t�|n���� �4C���>��W]H+s��ҌF�N,��%ϭKLs�ki��`���NA���9!���ݒ�.�_��Β���G���O_�$�4�:Մ� ����_��#��<ph�r��K�� p����F�����oy�V쳌���ld�k]�#�s�`8Lw
���t�s��E����!ٔ^N)j@8�2Q�i�b�4�R�!�HdJ<c���	�q�.>]����/EW.�3�S�%�^�@��ʮ����ż�.v������i�� �jalH��$�g�6]| ����=������B�x��)�}���>�mM�G�^��MS�M]\mfD��bK ��c������F�ŏ��7ˋe5��u�w+�sL���t���b�S�7��e���pDF�|�-�)j�R�ъ��C�Y^,�X�8�S�(�b���x�,x)��H,���̍�ZH霊�<W�%aO��<��K3��0O�)�L�I/4O�h��|O��m��h���枉�-��z(#��(������s`*�����p�7�}��e��u��H��xN����[��7�5\�'Ë����v��z��{m�8���m��)�����gmZ��t�ȴ�Z��
�m8��s-��P a�����
\#�q��Qso�D�d
ם�b4�	��f�2�7Y�59T�t�-2�q(F����%�>��C}�%�*�m\���>[]� �S"7�/�K)D��D#\_}�}��r�Jɬ�ᬔ��T-��v�)��irq~�\��Ky�}��������E��k�i��/pЯW�.?�L�Bve
o}�x��2E���O������]Cs�
+n��bg����P�.P,k�ZF�ʕ�� ��������f�E卯����������ϝJ[�E-Kf��ע�Y)�Ջ�[D+A�R�XM���4g��n�v��EQ%�	`�*��L��@b�R1���hG��	WY��<:Rh&�>{ڧ�qmG��[UakK,Z��&���R�e�9��H�1�5�.����pTD0Eq%v�-Ε��i;R�g\M��S��d4�*��t'�^����#�{G��QA����f�Π��>Թ�~SG�ũ4[�{�G����-o�s�|���N8)��=��%��@$J#�l$Yꘝ�F:��Ӣm���v�܇s�Z��(��Dւ���VZ�ݿ�>Ǒj]�#0��^챒y��R$!Y�Mh@h��^��"�+W �P�TZm��4�,��cS�E^�j��j䕮ܢ �$R�H�-�GP�P����M�N�=�9 ]\�xAs$P�2�\�d��&�̚.>8]��H���ŕoEM�U$΢BQ*n�{��M?���{�����TI�8K^,HV&3���E�l�F��[�ɳQ*"�����[���`�	_�K�i�����+��K	�*�����0�E�T�0�(�#�,�.�X�_���d��Ӄ[O��G=�v��ʟ�/�d�5e�Q�<� B�3�zj�[]Ou����x��B�L�1C{9��.>�c񨋷����t��6� �DdU�L�#��b������o6E��7�RBΐi$V&Ex�I'G�6��.���~˼��ӗR���"/�RM�2B�����!���\�
y$*/b�(���Q)���v����E���4+ْ��Ŵ�)	#{�|����s�ׅ�'i�,�Ʉ�4a�^GU�;m�D˒fm��B`�Ϭ2�a����_P�x���I�*Ipm�>��vں��n���i�v�z������ik˫MBU�С!�UDK$�l-���L�O�I�R�x�:�r>����p2������_�B����ʞ�Փ֖�,�[]J�7-ش��ZPRYk��2ێ����Տ�l�~�]ko{��A��MQ�d"�Y4��K�*�Q�՜�5��"}>;�m�%�Z�+DLz[8Q@S�H�,�A���>�G�t`>�B�8G���s�*�tۧ{�*6&ۄ�����a�0-�Zh�B���dE����a+/��mk�X[�v��I��ul�U�	W�A�#ΥjQie�٢��"ܔ�!x��P�qK�c��Z��h4�ߕ^=a��?�y[�� -�x!H��F��4g��fiX��+b6Z"sq�&�OD�<��n?7�ŋWx�r��R9W�HV�d!P�7ƫ�`'*X��-K��@��4$J�3�v�|����h�u}2N��x��X��;Y=������Z��	L��\]�	��	g$��A�b,f��o,���=x��ݘ�/j�\�l9���Y1U4>C��n�!�T( �'�Й� ��]���7\�dIW ��R��S��S�˂
!��Aj,V�H��Q�Db��);�X�c�X���5^^�b��8�I��=.	4n�Wc�;��U�HeŘF�ٸ`�T��},�h9GghR�r�g>D�4�}��||~Ai�hF{d���`��1��ю����o��7\/?��1}5?6~��}����◠��}�Jf�E)H�	��`�@����4҄�gF��5e�;��r$>����,�z�B�(`�?.q8�9/@�
(�e(#a��X�n!�@=)G�ʬ��OL�yo_D՗%B3\]Y�"���湟�җe��	��,$�1��X�Z
0Tn���M̢���z�����Y��s�?�]G.qG;BbF��	�.>W���l(����Q���H)���8�c6�[�V~��'��&@��	�m�J��|{��h�g�	WS�ZU{��&��j�֨y���qm�g�[��6S�J�J
�c�ŀLr}����<��ƴġnPgE� Ɓj����V~f��2Z�@I4�	в���ќj��}��V~�@���,Y�7G,5���=���C�{���+Z��S~F���� {��g��V9ˊ��gT�Q�H��R��׮�ya�g��P�ٲ1�H[��t�u�n���>|�-����g�[,?3����0�tt">�2I�;g[�>lݵ}p�g��Q�زӌH�%)�����i���Mh@h驳�ڃHE7���+Wy\\ �:&��U�sEs��<m��nO�-���{.�t��s�r��`�H���	gT3���*5]|�x��kH�.�X�u�$	*aC45FP�x�KG�Ż-?#��7H�.�,3��bK�pŽ��4]|�X���3�<���� �8����2�3J�>���������.����b^GpQR���3�Y"�ĵ���i3����t�[L�?�����8��	b%xb�gFX&��M�.�]����b.��+s"R(]B�p�g�3��(�6yD��2R�yZS^]6#A�쓞%��AhD��.�[�D��2R�9^�YSl����'bD��e�7�j�K���I�k*��H��J�i���n��V��𭏬X�orx�����)ؤ=�bc|[�gƹ�!��� �E �[e�����w��Z�L�Xm��Fgn���Qm-}x!���]�h��E����\�{�z�]Z�V���.ii^^���W�Dؽ�.�V
Q-br.�"��m��� ����c��%A���i��F��3�up�:��(@U[)>F��5�q�E"�:t�Q��'�Cחʲ��T�c%-�L�ș	-�У/-�������	]-V�b�#QL���"�:2�'�-��A�,k��)� .	v@MJ����F��u8�	P�/���"<G�V�,�h����ux&\u�k9ǔ#��;Ņ؀J���6Ƶ�uxlM�m���%�O8�۲��i6ƶ�u�#��
\ ������vT�̵͛c��:    �WW�Zb4J3�֒Hq�e�!��F-��s!++?K�WXjP[�Iq(j�Ӻsji�TZq���|\�9�C'm��,�r�;N���L��:��#^ZZ�n*K<�b�+��M:�*����o����r�.��֡����|��%���l5>F����/4�C7��Q@�M����
�����ٚ��о�#�<�]����	T�9%I w���D��<ma��'��:��t�9^�ES)�ļ! �&�72F�|�����[Z����ś-�y�rI�9��g�'6����L���Q�2��\�*�l@]�2�0Qo���-Ms?@v�X��:�2�h+���2jS�D�-u��h�%M�6>�  s��}��4P���,E��ᆱ�r	+�N�{%kO�l2�Ip�YF�2��Nj<`w<�n�O��x@�#ᡤ�L��SB�R9�PP�'��x@�;�Ȟ���� Um�E�p�[&�y .��j#]��曆wh��Y���]�J�R�!��+e�Q��]ᦋD�N)�f�c��%٩�� `
eGR�m���>�4]�]�&SPw��`�V�bZ�j"w�
R��<m���.�RD�]^\�GW��H�x���)��.��fk���"�T����UPN�A��+����R���#0Q� t6ybT�FJ�(u��5�m)E���%KYv0
i����^���c���
k�OQ%g��"{Q1﨡*��W�{;9 �ڳ�3TK��L�f�O�VK)�R���"-�HK)���"%�w)E���ڄ�qQ�RJ�JH����;�i4����I*�@c���l޶�[�I�nK;sQ/�ZX��8�bz,�|�}=!��S/�y�������XCd9)�(p�F-�~s�j���%+(�wȎ�E
�"��D����>���!s>������g�vy��>�\��Pd��IT{�$,Q��僢��6R� )D�[���2ێ���^bcF-����U��䊚P�K(�D9�V�m���iBs�DFÉ3V���ܱ.4��+��+].J5��)q�)T�<ɤ���R#Y{��T"4(hITRX����n�a#Y[��VxiQRhdF|�0�cpǌƍ�jq�;��U�@引"�#�\�\Q�Y���KF�����&LJ���4�lp���M��8�h&���I^��=����H���m��^7��X~c��g����Y�a5�����R#TH�,cL�� 
�	YNbM�EkZj�(��Ѫe��i�zK�N%�SdĘ�\���E�Fo�����	5k�؜<�:$-��c�X���]�^#9{��Dx+�R�2���j,ة� �dTҀ&^x F��1F���X~
�M��9��RH��I�h��e!����Gc	����X�J�"* �`aqd�	Ͽ	����d<�U�����D�ި~�������9՟�-aN���/蜍RDA����E#�Y@գj�I�%�H5���ҥ
H��3_h�+}������9��AjTV�HH�q��1���|}AkT�xYZ�U���N�R��@ЊR�x��F�w��`���RE�@���f�{`w���h����p!j�3!���QG�{~^=��eC��
���9<U=������bx�9�5?6W~�����#`Gڍ�}�JfF�Iಋ)��d��+���9�ׂP�(������2IL��
-J��,ՇShQ���VV@)ˈ�	�2pW�J=�z�B�Ӿ��/�p'�,���Z;E�"�їVh�َN�D#j�b��RG��i�<��?����A�l*�SI�\�ϫ$.�Z�
�F�Z<�	`�	P�?I�2��+b�1R��kO�Vh�pu5�ʂ\�9�AI�A����sW����B����������.��9�] `����v+����SPDBp���lBL,y�7ƴZ�3��µ+x�CBn�)"�9���y��� [�Y�*R@k�	I	� ��L����g�ӝ�B�/�Т�f�W\hq*m��,�d�;B�L ���(Oa�β�)�8��͖ �J`��m���yDێuN˃�`Ty����� 
-N�i�<,�~D*#��'0�F���>��eZ,�!��"��.�>[6�i��!-6d�T.A��5Jh�WLƠ�oq ;�%��L��'��-���u8My���L/�)��%�6o1��T�V���#R�@,X ^�e�ɲ=�Ӗl��$�faL��9~ɦ�s�rc�T��r��~P�	9Q����T���\�xϕ�FKZ��qr����ˇn	��Re����.>]ܷ0�y��1�s�ڢȬ�\��(%:�4F�Y�.~f]�ެ.��\��8O������C��=q���{���	՞����j�)K[t1gąȊ.6:�d�<_G��Ϭ��b���<��m�Vŭ��-I��5Ƨ��l7]�]ܷ8�y���ڔ+�:8}�%PJ�#���A����4]�������jS.��$2Fl�%��Z��!h�'��tq]ܷ8�|�>�j�.���L�#�F�I)0���aϭ8�^��P?ո�X�>�,�
�Le!�̽��Zq����FE$s%�]ZbOT�l��d[q��ř��$�B�����L%�ɕ ���}y�>�L�"�5P�PI0F!������_��s��<�o�蠘R�g���[q�V��'li-^^Z��W�Pٽ'��U�o��-�EK����i�r�b41�F9�K��,��Ai�+�Чj��G��C�*��A#%��g�c���0Ji��'Gח�{㻔s@��0S4k*D����KK��|��CTՈ�._�$�)I��N��ڈ�4�ru�w��� �)�LD��)��rK�q�����k���G�X
�+i�}�BK�q�Vy�|BH%O�X%Q̆X\[��7Ƶ��xl]�mY��,�*r}�Th)-_�l�4�ǔW��3��]M���28�H���Ӗ�cϸ��	�,%�ņ6{V!��ז�c��V~��#+��R��Q��2�y�r/d[�7��C�����^s�N�*gY(��P�<q�9�'�N9��,;�4�(T�xP%����&a��(m2 ~?:�E�=���~�0�pt�r�q
j�	*uLX_ꐘ>�M��F�c���UP��f�ǝ�(�R��&�����7yd����<e9J̉�<ʍ��q��Gh[�u�s�����xe��H�|N���'h���ɰM�.6oWW����"R@$�!�r�y��!*�'��tq]�;�Û<�V�x���F]l�-U�=I^�f��o�� t�voU�ʅR4h��<t`�4�K��8C��=tq�{Λz@���̈�wų<�����Y�P�i>�����N?r@����̡.��GA�"@�șY���M���}�:� �����:�R��`"�.[����R����l�x���7�����&O�	���Ra�qb�@:k����t�a�u�oWW{wQ�Lp���EL4da|�Z�q�VK���-Qoci��Y�/�R�I+�yc\[Z�g·vj�(�Bg�&!��]JI����[Z�gƹ� M�'Q%3K"![� R/@���޴�Dȭ2���$p�1[����}ϯ揦璖s��@)�+�{���� ��,Ѳ�y�&˵He*�rId�!�KA<B	mN���7��Yk��JG�O��$��k\�D��W�_����	V`�/3+՗M伏��R���"-�HK)�R��>����I)RX�d�E��,�T�i$W%��}w
�)���\!�a��*��F��h���D<FM���l���b9�5�ԉH-uɲj���B�`7 i�$7�<�u�zB.�^t����E�aFO��T9�5�Ѡ�c�*6n	/Y�%J�%�	X�9��3�e�6ƫ�o;�������ވ]���l4�`)�wL����|s9 �sZ25E��Nh���k�o��ȝ���8�J ��R|�GW�1�`<N��:���pF�^�nc���bpy�CY4��d�M9ɒ��U{��l�f�4��A�	nm���v���um(&� ��)�ʟ�<�A�#N(FrJ.Y+�v5�����X`�dM�c����g�X�6V�j�Y    e�J&ⴃ�YB#�4�Rc�{���	sZwDd�C
T
�<ec�X����Yd���/1�E��6ƫ��`W�O��i��iCR�T;��f=����g���	&M�4)���*e9Ox��W�WG��h*xV�/ڨ��IG���7a�~8��'#���>�חH��oT�Q�=P}�6���Rx,�X��!�~!�� f�v�A���X�j�"��:�9HBi��$Z�joҨ�1\2�R��})	�Ib �@A�=0�d��"7���./��m�n�v[�_�nq� )qю � G2�9b�[ԫC5bX&R�H���g���:�R[�w�����)6D	��%%h���X�1#��Wo�ڢ�Y�a@�?4��.|V,z�t�ư�綄��%��b�F��ȟ|2�Ѽ1���s;�NT�pP%n�\ Q�,=������s܁hTU�v���˒3p9���u�_�r��H�����hg�wd�}��&�w�����s*���A����7~�����R8���S%j�%Jv7"�G�l$/*���Z�+�u���f�w>k�I�g,ܷ��T��J/0 J���&*�Yi5O��@m�p�^�/-&}I����)&�	7&<ۤ��ϊ,�M��O���sF�3������n��>�`�k ���L��#ۀ��wxV�?�P��K�2�a*IT�4g���g���U�xAU)�}~��Qx���� ��@IH���\%�B�Ͷ�}��j��`�� ;"�r��R�(�EVT˦V^�Z�[V+�Pﬠ�KT+��1B9w-�)���G�ϳɹ�����غ@��g�|��f�<Q1�B|-A
.��61c��,��'e���v�0R)�ڊb>ov󎹢$+gt�C���2�S�Ƚ�mJ�(I�}%���/XI�j��1%��Ԭ��$Ƹu�1��5��ؙ@�"P�Ξ7%�#&N����R&85��E��o������c�^j�@�0B��wew�_˺��`��Y�����S�=��w���p�`�~��=3�3�J��Wax~}q9���/�K��U���~�^+/��^'�O�ϻ��u�ۦs3Ϛt�������_?x��ߣ�1}Y��l�Ce Ju�{[<�=��{��<ֻ���_�>7|8O�����f=���%���݃����?��+���O��ϢY�^��W�x�W�i�Z���^��^Mݔw�����=��|��ɧumE�[]�#���}Uf���{F��n����w��w.����q�jv��!�oݺ�x�	~�L�q9~����~��j�x_����3��0^��$��~�i����4��Q���E�!a<�d�(�/��y)v!�e=��_� }3}�p"KZ��̓R�u\$�x�%�F�;���sR��2S[��Z4^��|����Y�.�[����;�7���O�w�	��~��-�y�7o��i�\.n\�ǣ������G�]�����1��f7jo~��g���?o>�M��*�L�������Ҩ��7W��E����7:9�4��͇�5�-�Z�Փ31Nu+oDq��p�݆���OP�����ܠ�K0a�\ʑ�ɰ���F�|�8^_}X��{w<�C7!o�n���K���	�r���+�u�P~`�����G����<o�^�4�b?�d6q���w:���9{���ˣ[�~�'����'\�ޣ��o&�Ů�����rD��:.��'�G�A�q�KU����hz���# E����� ���:����ç��#vr�ԇ���n��7;�}�?��X�#y���<Ϳv��>�I���.pQ�ki�q��B�s�ؔ������z�ꃿ��x��<Bq�tò���H|��<Mү��|�ޭD%���eP�����??0����=C�>t\4y��|I�� �UHO�����kу�J߁d񓳛�?��������W%L|k�:1Kb�i�(B���Dh��;��'g��(/eL�8����Fl�O!2rId����Ǉ&0a�ky�;�yr�(#8��S�u/_���mt� dE-��ŕ\�������[��?֖������%9_�kH�@����(?�H�~s������.��'�w�|���w�T�Dq��*$]����] <��%�%�))¨�ѥl9T��(��2�j��9�)MN)�l�#�)�z ��Gß�f����$�#�~�4��<���Gڂ�Y@ (��&_&6sCXJ�FJ'��m�d���V}a�8���-K*kyR��Ϝ�*�a_nbi�ў�?�2ˆ� )@��V��H��*�� w��u�U���awU��`"q11o��)�=��L�� �ҍ�W��Uru:Uu{�K���.�������}�B���wF���Q2�5�<$nX����c\-�p�"ѐ�1:�����m�d�ClrǣP����v�4������������i0�#�7��Úi�^�E�$��2�$q29""M�G�|�^�[�D*.8m��٦h!�9<�����r�����Ɓ�Cy~�pk�Q��E!�'<�+W%��S8��e�wm�<*��u��ۃ�ӂzZPϋ��p�%�Ԃ �A,]��2��ڜ��1[�7U{M�K}�N��?��=����f�u���rqVO��z?�L�*uܙ�E��Ȳ�}�`��S���$Ϟ�攞UP�e�K� M.�A�Bc1� ��Y_���ޕ��qc���+�bE�����L������o$�v'�Z�n����cUl�uT_j�e�V������E>�WѢSIG���h��ڰh!G)�>Eڈ��Y���>U6�?C��RS��8�eȉͥش�JP���vmDB��B���eat{埁�⹲�>�Gy=�M��G�-uz8F�pQy��Y��ǔ&�^�U�K/�����-J�<F��c���i�(s��ٔh��`�	Pq��x�%�Ti5N��Zx,��3��n��׵p�d2j��ٔ�)�yN��ڋ���r1��>���׶��X�3�f�K*���T�d���RC%O����J��ó�Ζ��fA�jA��6Z��)����M^��$,A����|����MQ����i�43�G�y����o�%��wD��B���\�8��>�#��՚��١0O<����J�w)�aM�m���5fǄS�����d���՛<�q8�����o]t4��)ǈ��I�L0�g����S	ii�G�|r��U"RG��)��&XBE
:Lwq�v�븫���(T�R`JQ^\SMT�����J�@���G��<s�]�q���+�s�U��w�s��x�t�)���q��U��l�d�ˌUB�Z�姖o}�6]�Lw�p�^.s+[p+���52i���]d��v.761�容�Z(SZ)Y�	�PUB�d��l�ܺ���ٝŚ��ZOR��i�(E��e"�A+g�<�gڗdZz��~���V�^ʖ���>,�D���b�g�^5#u~;����/y�V�g�7Jדٽ�����p<h#0��9������z>ǵEc�t���s�z�@3�p��ر)�=^�uq�d$��@��FSLv�������bi�PY,kۨX�hD1�s �$����.��,ޏ,�e��~��"��%o�,/��X�9ц*k�gpzY|��l?&����j	_S��,�8��p*���{Z��eqY,:�b��9~@���L��&�,F��^�l�Fq�Xn�,�k���N)�@�3�6�hBȠhT�Fqx�:�b���������\81ZJ"Ar!m�:�k�,~aY\OA���B)W���2�+�����^w�Ų�,�{��$���;�'�"�8d.�K^J��<|+�]C��G���p�ih�>}��8�8a�R�i�nǓ����:b�x��w-|Y��3�(��Q5�`)Z�����8��Ds����G{��ù�!	2`��N�D�19��Bv]��
��!� ���(���˨�,gFd�9������
Ii��#R 
J������5���_Ldv&q?�D��d�i�y�>�s�gmF�w#|\�S@.��	�%<�� ��	�,	�'W�'�Y>�k�����������& �[�a����,��\�;i�.4Y �|�x� �  �e�ޗdw���̋�a	���l���q\�D�MTPt�ZN�Z��9U�(��������ѽo��oD�r�:а��u3M1߅
��r�D�r*5вL/}dm�h$�Du"r$�[Nr�	%�9�Ka�N��J>@
NPP��jk�FLD-���4ZjB�@�H
��Yђ3�b�EZ<#�H3^u��Oa�bs�h��P���/!���:� �ڈ�)e]�lmI���"��㙸G�Ȉ�Q�S�0�`��"�&6;��l}n�	Ч0x!\m�+�2��Pω��AS�S�1�}
��c�i���%i�'^3K�F����൱���['\�=��a�jL�W!�vN I�z���ڧu�3���UhI a�"���p6ǵO�wd+�X��K��'ƃA��<j�k�jg�,��~����u��;^��uh��Z�+d�H���)��6�h�p]��+K�ЎB��&�%�
GA��y*� ^�.�Z񷫈?q��|B� �:��^<��ĖD$A���CX�J���9�C;��w��L@�F��%d���=�� ����=y?�0�v��K������="�F&����]�p�0��L��tb�'L�����hj��Z�x�8��/ei�ۓ����d1|��XTK�@�#��!�ZO���,�(�l�^w��]�:���8Y,�%o`��� ��3��9�������x���KL����J���@)R�W"�βn�v����i`�6$��� 45��"�<y�CJZ��}���e����tg�<��@�R��1��8Y}�mR�Ї^fZ�/�(q;ǫM��?W���!�*���B�}����iY���~�dqe��(���{���R)(�9����dq״r��D_�,����zF@�'oˆ;�A����ϵ�i^&xKTK���$�&�ztz��`�AU�e��O�pP��_Ye|��&<1	]��j��K}Z����}�TM���Z�m��h�.|�PZ�����U�9g�
AfMyʔ��у�����D9�#>@ ��@�Eu����O�Чu��:�i���O�@�^�:����[��.�z"����JKp"����`��d��c�&���,�4G�7H<Ìi[�l��tA!�]��s�[(�+A,��P��"��h2uyBv2�1~m��OӒ��۷r�>t2=�?�c��j].�a�8%,I�0D4��6�p�'g�P�d���

@��:�S��ݺz_(vU�u4(<*5�ժ�3%��yS�r�PC|_FEɽGW����R!�@��wwߚ����A$�=Fy�8q4v�F�����}s�qj������C�t>"l����������/n����Ȓ۶UW��ܭ�!��G�mk��̶�g�/'x�O���d���kh��#e����.O��Y#4*;t �C+3�TbI���;SX�,7h)�K�ERB��Z�sTk�����P�À�01L�P��T3�������b^P�r�dāq�R��б�K��zx����D��K���E�$��8�l;`����"�rq�0��ｕ�[ɽ��+�؍�dY��ie���x�R�9��qI�j�<��T�����������[ɻ����]b��(�#)JЁ��b^��J����o��`F��=b$u���`|�c�[�[«2�u�@�B��r�+k��� 6ƫ��w�]���S�¬5���ap4��!������y.������YT�!������-��ʀ��d_�`�LH������M�|?NƓ���?���k4�{S�7�{S���ⰱ���Q���)��BP�IY��h�����n&8� �6���5���zS���X��+5?TV��R/%��t^��������9�d4��]�Y��Qy��1�M�-�%*�����K5%){��~#��x�����
M�)�R����ظLeL̪��M��
뢪�VgJ�b�E�3Y��~�Yú'(���r"�/<�I�������xp5�����3��K��}����X���}߈��9��=C�Q�@�MZP%8��҈��9ɰD����d��R*�+T�Oa�	 �Pa�^`@y�=L��%A���y��� ��B�j=Z��D����P��H�N������&]}0Vla9/��sT=�L��cl>�(�}�#xLЎ+J+�&�ȁ�ǧ�F�b<m���M�`�51jM"F���u��
ǫ��!N���[t�(8�B��4�*J@��o|��@!{I�ض��ZhC�x*@�%��!���1Q�h�*��T^/VZ��-�z�����5�^1TņT�X/I�0��8�\�3ԫg(�u�ҽ���V���R=��M&����J=/��3ԫg(ؾ��~����P�5�3���I&���Fi�Q��3�g�Pr����ᯙ�d�+�̧��z�lSZ'e�`y�zh�+�$��9�`@Q�X��R��F�H��`�U�5e��rL=o���%�����ι�J*�Qr����3�)�7��0����-��~-��?ʶ*~:���
����;��F������6�o�,IΚ4����i?p������<J�ҧU_ɖ	*Q��bF�O�x�<����M��nE�����a���e�~�����jF�c��9��v��ɟ��?����S,�Y$���3�~\y�Q���T��Q��كT�2U����3��{�����3��GڊfwH�#��}Sf�����4�]pl�]���[q0j�`�������ҝ�'n4�/��5��gm�wKA؊��}� �'�[Ψ��xx}r4M�����ڀ���6	�Q�Q�E�"a<�d��O���)6�mE��2H?��'
�O!�y �?����+����L�aU�V[����I���/5\y<kפ�+<<{���y��?��i���������[��:��V���x����^>jw �/��G��eS�7�w�߷��ӧ�I�N��˔h�Aaղ�\5r{z��e�g��丒��6��;j�����s��!���\���É�l6Ǧ�sp9A��k��˹C7�`�x5���2�ac�F$��oo������oǮ���޵"鲔2�;�=x{��N��?l�z[�08��M��x�����7�2��n2�8m��JÜ��[o�^���';���ޣb:C'��L(ʮ�����B��:.��'�G����q����<�:j��.q4~=k���y��?^�z���䈝\,�pqr�4�dw��K��+�c4޽�L�]��F�Ҥ��C��P���4y7j�B�}�ؔ??a�V[9W�P���?��x��t�,�4ò���%�c�L���{�oH�JTb�l<Z寈�h��##�_��v��P�UI^f?_b�<�y�3��>4�ZP�S��;�,~r1��E�	����ϊ����:6Kl�~��B���P����������9�KS�!.��ۈ��t,K,���p;>4�	�]��_��"��Gp@��h~����A�A��\╫1�rW�d����?��d�q�6�����y#����xCrL$O.�h ��#���C鯚�~>9\��N���~��3_�\�c�T��U��r�OX�gH����".IZBY��H�yAج_�,�=�[����h�a�{�?o'���� �ٍ��Ewx���L��ȥ^��ĕ3Ҏ�V��<t�iG��z�؊�K��d��,[�T�w���䆴L�ڿ���_S1�2˚� �9'��TFpTPIKf)W2�L9�qb6�B���Z��=Z������y>/�KN�qS�W�x�"�n�^���Ӿ���������:I�`�$��B�$���DV��f�a��j���Ք��R;�d�D(�q�i�]�6gv=�;��]�I���"�yju\�r��i�c�EEu�H���BZ�:��2d�:P�P�b@M�`�dVT;����:a��ɿF�����\�iK�mJ�pR����.�uJ�qS�<���&^���h��yT���y��N������؞�l�����t�n���0�j����l��Tm9U+�U��^���g'F�Po�=�ꫯ�Y���      �      x���ۮ-Is�wM�Ky>�N`���;�� ��(ï����i5+��k5Em�U�1�\��;�������O�=Źd�]e��O��_������E���B2��s짭�u�ޔ�4Q�&"k�:��}��]����_������s�����?�m����^b~BI�i��'�]��a�n��?�?����������m�Gؚ�ƽ>q;�J3���#��mHO�&=����YKX+D�t=��Q�����x��5��VM�uA��s׫��L���{�=�M�c}�6�i��'��Rlfw?��a�3��O_+��^a޴��BNOM�?��l�lk���6k�CZ��gj�+{�þi�v*�V�6k�a�^-6W>�C�]�R�ӓ~0k7ƌ�J7m��'+����gq�N;����������׿������������������D���/�w�\O�Y�-=ö���M��nz��x@���3����]�|����~���ܡ�Y�ig|z���7g?��(�+=����m��t�onF��>O�%=��=|���ăK�=>���Aԫ���7�;�y��ȇ����7w��#��jb�*��֚��M"U��<�,��ֶ?�Y(F���Wo�1k�f�^{߷/�8�}�3?���l�P�D��n�|Q�l4S��)y�Çu�D��A���H(m�­��nڡW��gs�iK��lK���C��C3U2�	&���}�9��ےX�jGV�c��ZWG���w��3�܂Kul;���
P~�~6|yj�*��S-;����%<u�,A��(�eq�Mۜ�E�����ګw������\O���}�mk~�^j�gݴR����:S�{���v�<UL��c���l��ɛL��3K\V	�2�L҂{�����1yH�zn�K����Jq�rٿ90~V�ѫ/���;���0�^��Jz�ڟ�ttb3׆���M뢶/ۅL��ʵH_��{��������f��Z͜��_�h��4�鞖�������C}�i�z�d��!_��;}��Զ��V���ekc�Z8��K�����( �Xl�Zl�.�5���V��N<Q��P�k�Z���޴��� �d�^��mr�S*�ׇ��U�'���1�A���2$?뛝�cm��b����T��:��Zo6�9 [A�dִGq�웶[���kU뎸�Ll�����.�6sJN�U7���+h�2E4_�O]b����>I�=�gG��P��>;��M�R��~��O�v���B�b���M��h;�ւ��0�X�	���h������h3	�i���`�#΍�q��Y�f�����^��ݴ~����m�i��Ǯ;���mGǼ�}R�(�o���V�N�1�ej��_�R����n�l�WԮ4����'�����9\~�m�ե#f�������y�x?�d �%�e&�L��޴e}"Q-�^�����nK@�`㞓�l�K7m�Da��<s��4�������s����!#y��㫕5b�̏���)�)�*�\�J7�o�����l�	+�B|�O.�#���6>#�{��<��ӧ_��8V�i�xC�P�$��5
�̥k��K��*�K��)��I���+���nڌ$CkFxz
G��y_Vhu�����%�1��[b�~�N�r}a6	@�Õ`_�]o��!	���:��>`~oW����B����~bZ���j5���y�;�Ve#�儔M�f�i}Z_��/�WjQ�]Bs��
�ˁ������M�I��|��̪+��Bې���u+���.��^ps9���k\e�K�5�Y캌t���"Z �b+^bJ�g��G�xm�{Y���J3��ٕ������e�`���B�-����]&��i�QI�.���j�¬���66�&Cvx1�Џ��~{\?�r=1�0t����1IV�\���YǕ]�2�S�B�%�6�mmW����W{[�rqƋֹ��X�	�ϥ�72^�QZ�K�	�Jl� � {Re�i�?܈r�ϖ�t�׷��ʞV�����ŚR���B�s,]I,��>0Ѯ%��EFE���u�1*�����U�O,�sa?%Jg�c�)���VK�&�G���1&�� ��M��Zb�*斾�ŕƷo��	�a�ы0�#�k���/�ܴ2�D+�-�R�H�0�4L�����Ϙ,(D"�f#�N��������lW�E�R�Y_�o-�t=bI��F��|���NK�2�ږ�$��\B�����6}���P$�uz9��^��_�m�DH^H+���D�/�wh.�R���gG����[�?�"i00�P�\��7"��ŉu|#]��<���?�Y�RN��O�k,�/d��h!ܴ�8��0H/��Lt����i���g]�!T*�ˆ�.Ϳc/�d��-v>#����dC��u};%Z�~�>���i��e O������2��u��ƉauX7m��.W�١t�Ci��'��T�8B�����.�?�VoN�x�e��x��Z#ԩ��[q�	�c!�g�KY�Qv������xݨ:�=�-m���o&>5�)�����𾳞�'S j�]��oR՛����@YU_$�z�H��֕*2���8}�I�*��%�anZm& EZ7�Igdcw�����F ��b	��(~@�o��Ek�x
qmX_~j�u��;__�s4�΅�L������Cy,�(5^����+B�����ձ�����t��z�nev/c�VFf ;Kb�ǯ$8�W��ߴ�^�f��F�ؼ�uq7�H�)��u�D���=���.k�'-mzN&���h���*K�]�YeZ. ��D��6Z��d֔NceS�M'p2_��s�j|���F��@�QM��H�j��>l�����$��vO���mq�V������	^w��1�Mqy^�}uD����Z:��l�G�ٵv��ֺ��A
`|C:�4���t����*Acπo���G�{�r�Z"s/���J(zws����d&	d��m�����-j��H�h�h��=r�"�5�E8�q�ۦ.^M��F�e���M+= ������l+�yI)ʷ�mE�Y=]�IH#�2�������h�7O�֖4�h�ֹU��V�ϴ��\t�nډ��Jq~���Fx1ն>�J�骸�����}K,>�e����S���(��[�u������x�uDӲ���0��jn�.�Ƶ��W�I��������,Dֲ��e鱔z��|������d��cu��d�jy���(~�eH��G����i'|P2��O%�6�٧�����*�7"FN��iRԾ�ko!,��ё"( �*�2]}�G�u=y��	<xɧ�v��:)]riQ�����:\	�a���d�LL�hה\�9��&��,�ʞ�>��I��ē1�.?���AQܓ�u5d_��^���cb
<B��N�����.}\���`O�k;�M�uwt���9jK�lI�oY]/Z/ ����hF�G�)Za�(X���NYW׎��l�c�>��;S���a]֥.osZ�����	q��[�����2t�A�k��H ��r�&OH�Jè��q���ۿ�?�r=��C^�s���K�D���Q�gi���e�[,���ǿ�GX�zn���ĕ���I���܇�@T���� n�8��O?nZ�d!]Z"�iw�%)f27-.TI<y>>���޺�3\��� '<�2�š�:���[��`D�}�)���*n��n[��[���n1W��nn�-�pY�KR�����ׇw�D��WMDM�6�	@��n�L� �5�7Y�"�mZ���b:�Sh�s�vo����e�7��A�,i!10r�5"�f��l:�`-^�އ�Hڳ��_���E*���u� �h��7H�잂�����}'@�3��B�Fp!%���v�a}xDǸ(hǤ�b�^�~b��#@��
@RT��|y��ZB�!҉<x�����f�l4�O�����-i-��	k|Xw�.[����2�l,&���?��������<S.֕���t4gVf�,���u�&�п2�¶a�n����(��i�ڒv_F��NПV���]n���qO�F�i�[0��_�ݔt���(i��g��I��i�    �I�B�)ǳ���؋z˛�f��<1���-�}'����S���n{4]�kHǾhIk��{�(y
.|��9Np���3����~��`���t�a�G�w�_D�)Z��n�U2ٻfu�Z6�h��C���[K�:X{�:���x%e��*��f�_7�����O&Uev��[�����+o�dr����.Y�K���3���{AJGG(�Y�+OK��x;i2ef2�Ҙ2Z���A�O�,]A�w�ٙm�ߖe�I�ڂ{9�v�f!����C�;ΛXd�~�iw����i��g$\'�o�+3gy��.�L/ڎvo����^җ�Ӌ��H$q�u@hN�"��~@6^�z�"�N_ �ZW��<_����T��Z������ Cn(2)��a��Cf}�.�z���'����Z��s��W 2ck�& �Q��#�g�;���+A����<9�����o����9�VC1�H�O3B���@ķ��'�W\��/I7٤�����v��2�]���oh�����4�6�)����В��󸗅��[J�@K*p��EX�Wbw���=ٌ1�Y.ByQf�%�eݙ��]�h��M���ַu�l�9r���������V���B��F�t4���֣?�r=��nt?ݓ�v�R>|I �{ɶ���'� R2�?'T]z���.�HY�(�J �	KE�mܴ	�z��djI8aI)h����Ζ�A�PwR�d6�Ϳ�����r'Y���R��Q�N7m疐(��U}��#Y��o�I4R�Zv9���<o��+���)n2.F�%�m�}�s��d�� ��,pF���6g%Z	3�`�n�ə��iz�D��f}'�e��q��9"��bF3�J+:��}�\�2SA�'���o}M�7��d�[�M��o�5�«��u��Z��������-�Y�v\��B�ƕ"��� ��:m� �[�d���f�!�H�cN�s� �`�D�qK�<u�?��n������䈊36>4��l�� ]���	ٳ9W��bn���� sF��Mw���s�fO�n�>�B4��qTA�p�n�|C*%<��u�f����]�,<�2��k3�7����U��8�^����F?�r=1vR�-�2aWrV�R ��Q�$؈�k�/2�L���sh�� ��Z�s3�+��*)#�q�n�J�9"x\���^���)�@��[�|��;g���=I�0/<n��M���6'�]����s.�b)]8�E+$oNʟ�L`/�)<'�Y�;�Z!]2\���Yl�ƹB�i�:Ea�b��U�ۚ6�}s�hO�� ��=��Ox���� ýM���3���$-�@a��u��2��Ę�Y@�Y��I���D��~څ�,�4Q�b&�#��v/@;ȸ���SZ�����;x�|�xR|�(�}�,B[V���hyp$�A�u"&�k��6S�qT��%�x�Yq^6���f{���טx�i��������?�r=����t=Ng�̚VV�%EK�W(�Ȏ�w��[���B��C�nÓ00���9�i>�nܠ2���RRxV26���L.�cW��MYg����}�:M�)�5�n�>䆡M)�kG~v
�'�'��8����h�Ġw�L��C� u�%}�Ӡ��!��uF���΍��~u)䌌ޒ�2qJ�tXVJ䕀y�mZ��������f5��{]o�{I8Cˢ�r��(�lֵ^2X+�>d!z�z��֕�!��%ہ
#�I���������!6d�#\�H���-��M����{$V=��@j�//��\O,�K�5�������y�V�왌�M��{e�C��^�����Bw��#��%_�oX�%�(-��2���O�¾�UЮS9�*�`����k�Ƽ#|��a-�)��=Y��H�JD�'.�BD���dq�f4�v�B�Bgvq2طu>�m��@��`��Zi�Xs�1�"N�����u�Z(7m"H+MN�#?yiGk$ �M[0G�b�#_B��h+�z�1����ʸTܷ/P�
)�Q���1i�0�y�-�6��&5�[7��S���Ʀ��-����>�3�v^XB_9���e�"�$���IA)9	�o�Ϛ>�<*�����,���-qv��{(�������$%U,9��Gn�g��B۩ϳ��Yq��.�N�o���-�m"[D�ʭQ�;�rh)+��+�`��$������> ��.O�2��	�]rh'-�x����J#!���$�֝�������{HX�V�u�E�OUM��V�8������~+@�����S�����m���[�)�w�Z�J[Xty����+�w�o�?�u=���T�����z��ьk�`6�� �@V|��H�q[���0n�6����Hܳϐu4�n'eR�"z��$�`�7B:���n��HyR����o߂N�1Rz�W�M���Bbkc���yV���"m��H��rӞ -���-�FܦA���7R��W!�M���V�Y~'}AK��&�m ��μc�N`��>d�l1��� ��]�*F�N�G�u�޺��������\A��O�&*�QO���Bq��UG�V���U]ԝ$�6���#Y�������I��d�\�},	.FⲊ�JWU�M}g�B[aφ�.�C+�ٱ��ka��U�'6���Fv<ش��21ɮ�X#r{l~�U�_R�/ANAȷ���m���:�le�����D6I ��K��FXƅ��[0�'F
�{%{C6iVV��f�B]&�ٙ��AF�l���'�g|��g�6Ј4��]��+�lUb�z���Ԗ��X1��RȮ]�xrh�9�B���XqC���j��Xm:k��q��j�ú	�G��F�d�^a�\^1�/Z�g)�IiR�d#����i3.�b��kC�Yr�k}x��Iߧ#`���$�s�>ש|�׽/�6lu�ںiOSB#m��7Ӛ�kH�6��U�'���q����	�� %�ㇷ��<�}K$a{7�8t����Z�~.�Y�����N=��v���Bh��0���h�e�9+S2���x�8kS*2[�3uś��%9{:jLm��V�@�v޴��e�W�gʲQx�P�Kڌk� J#1Ga���>�,��D���������>�di�JYS��'0��i;𔤑�V�(\/S9u��'�	�9t�p8ǝ������J'�7�)+��V��������u���%��z�0d)��]$��g�?5z�,T�^�2ɨ��$R��ڤ��8�{�$�Sٟ٪��+Ul����Q�J�5���I�t��W��d�m���)�4�W�A�}��v,��´ �����T�'�;G��L�/lڲ�'Z: I>�D!�/-1% V��!�
�kT��BQ�4�Z���d}�Z7�����x�ړ���3�W�͈�{��-�c�t+<
��-�m��3��h��tY�Iޜ$�d�{��U�' =:&���9oR��B��1�6E��.���8��'@����\R�N��-��fv>KȮ�h����,�m���L[)�/�h-u�S%�F�{يC��:!��U�_��c����P�[0�6B��`�e9��~�M-}�������j#�}V�1ld��P���t��O�P����&�}Hj����:���:I�%��Ly	�UO�a�7ʐ�IC�~�떛�r�w#���J������^}��0;��$^$Y��Iߛ�7b P�C�����4e���p_� 1Ii�U۔�/����O��{��ّ �}۱lG��w���)0#3�YF^&:����B))��'�)�lu��oa+ړ��$;�T5I^�����m�O�\O$Q>�uPv^{������x_2z�)����ӷ)�}��%c���4�&�
�(��>�HD��
?�P��Vo��[dGAr2l�&ŻH՘��@݃�^�d09�0#�q���w4�Zy(��_���s��,Kd}[����>bLˆ���HƧ��H�B)ж�� Y#� 촭��O�/;��F�z�1Z$��$�����M��D:�l)�<��R=����ٜ�E��".���Q�f�-�
�v-��'�2�]��?�[2D�3    ���k}��|tN7Yґ\խ�'c�?>�������VX�g2s���.lp�X=>k����=O~Z�z"Z,l@sly=MG\��2��R˰��c)!��Ht�{z􇵮��Sw1�dq
�8S�^�s�֛�e�9�r��j7Y���i���W>9�Ću��1�&tc���l� �=d	Ds~�ܨ"��8�r�uV_�鲇���!5ʷg�p���F���a���B�l�,u%��{v��J��E�Ov&p�ڻ#졝�T�[x�o/;dٲoڅΝt��f���C�������#�.������v/Z�!2������2+���!A3b�C?+gr4dj�[b��1t�,#%7���w�Pl���i1�A�&v6���m��ώא�1���Ȝj���%О�@������N�vm59��!�*��_$aȔ���i�J<�P��$]��2ʴ����'.Ò�P.Q��2��ŞВJ�Nz֢/s=�>VH���2״��V�iM�Zko����;	�뿣ɒ�Bo ������-���[}~X7�:^*O;
�u�[e��^�zb9>�A[
����$��1���Ƃ�R�1M0-c�^��ֺ�{���H��MI��������Kʜ�Q,��ب�������_�Cw�����%��7�q��1�	�-��s��$�!��<<BQ�!ޗ5���ͅ����4l��r�?��}|�봎�I�n�!�|��i��{H�_7@�%`���B=�@��%��}�b�������u\2pz���|�e���AK���q�oz�
�
�sC�S2G.�,�~Ş���|X��.�ь��6~q�B.��YY��F�� �,��%j�ߖ�@�<�r+=���.�XU�x�8>29�KH�}����laAu��L(�Ğ�S�}k�DH���N�SOi��G�K�D�!AƩ�T1�,�>��F�mD�U�'����]�u\R�Y��|��ʁ�NJ�~���?n�7�&��i%xP|	��l��1��?�F�d�k�w%�\���7ːc���`
��C��S���~��'�����;!�n�k����?�|YEe4s��S�zܫ��k���� R��nt;/irh�N�D�sI;�x�E��v�nC+�N��j[+Ho�)o���$G|��<�Xɳ��y�v��m��$$��I�W+�C�]	(��ZJ�>\h��$Z�~$��a�Y��@��!�FD^2(m���[_�C� �O�l���H��R~[X��*�+�9`l��!�O����wZ��4�O}Ŭ3�o:�~X�z�Ɲ���е��ۄ���D��K�(6�V��]D=�\RB��]&ߛ�"}�ڀ9Yw��-1��&޴'}����xcmO��7r��	��J�I�A�2��nI��	1,����%"���!�C;�a[)�O p�|��|qfܴ��R�ru�	���9���}��>����-Վȴ_�ȿi=�Ɠ�׼�6��I��}n�"�P��A�T2�Ja��ǡ�VK�=M`�▀�I0�}�E[25��v�2�t�����:m�zEB2�\�}��	�:�0H	����c�4��1h�(4��.�,!��v�,��3��d�lڎ5���ǜ�W��A Glo����g�ݧ�o���}��h��=A"+��o����@`��*�Brb/���r��Mu,���ϐ�^aܬ<��O������좷=m��<�b�zr�R���w��C[���1���� te2L���U�'2� ,U��L�t�
b���v�0=��F#�O��ݪ����^�z.�R�a�I8����
]x�>p�Z�9&B<�I��f��2��L��i$QH<��q7;?	$��Ia�^��)`�Zc���铺̠�L����t���*�:�9:h�g���{�I^6�T�nߘ�8�{o��9���x $��
���w�Z�낡���8.�)#���6D�m�P�"�=q/3��Ay#Ph���* rY�n͔��pnsP����@J��/%�w�ȡ��M��A�ʖ�d��E�(�>q�#����+oc�22G�(M�5�ng]��Z�߶<?�}uO��:������3E��$xz<#�Y�,�N�m�(��8�L�"Fw����V��8(����
�A��nuvh�W�W����f.�����u7�5�C�\���$�t{��,CZ����:�n�hK�w
���ƫN�(iI�d_�H����;�|�}ل���~�Ҿ-��g����ܽ��#)�����u��i!�B_�q��Y�)���{D��܉��d�k���0�]��dT�j�t�-�h��.�Y�a�*�1��7�юx:I�Kl�\�������	�!��ͽ�I�������4���LW����~9��c`!ҟV}���M��Y�s�	Q�A»E;;��U�'"6��3BD��������֊��N���ٚ�D�-���Z�s�(m�|*���n������_C�zo��������Z�U�Sq�N�5Rp�u�D�֟�'۝��^�8H�v��=K�UgO��1�Pv)7m"	��JEF��s!m[ܼ9���*헶�N%z	���w`PyP�9�W����}���ّN��l�8�Л�A�MK��0O�pt'OJdq��\�A&��-�Į{�d^�߶�zf�}�A�[YB6�t���j27�ڭ�@����NMI�jF/b���P���gA]�� ,r!�}�UuͿ�8?��g�$z��)��n�n@�E�$pi���r�ζ'z���ĭG�F)��kKD�ivj�YX�xϝ�{�DK�8�rb;��-�ڎ�h���B�:a�"����k�O� ���	B�#n��Z�ojQ$x���̪L-K�����6PDHiR�z���d��:�o# �7�\��|���?�(�� ��*�3�kD�k��mZ��6�>ь��_�ȱ�����8�]����D\B��xX���kN��P�������340|�A�uOz���M�3	>ķz-1mf��a�)�@�v�o1��Й_S�J��$w�x9��vZ����h[�x,k�g%�{���z\"Z�����qԷPm`�Ġ�̠��5�,]vu:��9,�c�'f�A�)����u��.h�򔠊�e��r&��]6���{�zx���p���d#���K���,J=��ؕPl^o-�8����hU�R���*5��/I�-�P���}��:�����~�	P���3�2�Ѯd9�V�����Q�",�~|�n,g��u6�I:��Nc��.�_7��i���=}&�6tzem��y�����D��NR�Wy���3շ� 1��W	jz���tٙ�4�����Zi���1vې��v}3�h��S\�O����e�|�&q�F�������`�-��ݷ���83
^�S�H�(�z�3�ds�PE�=-�7u�j��=#�`G�a,�W_���3R��P�39h����[�ڑ�~�!�>�
�����Še����p�؉g힦�����7��A#c�������x�@Z��F��D|�M��w��o��dǸ���7�W$.��I)*�n�k��U�'�TԄ� �bZ�����_���q;U|sk�>����i�빓��HyF�u?�����E�����z�L�nRGs�7���9�"f]R���O�����)PQ�0>�l-+���Z_�OM�؆nvq� ��7��H%�g��x�k�f�i�{d�0�(N��C��S�6�#��W�A�!�?|[%�N��H�����Ff�{h��m�h1	O�a�NNv����aO�7��Ҧ޴V�ҕh�6�q2,J�\p�[�>����M-y��;�����~m��y:�O��M.�
]�����M�m���Y�M.�<N��(37��h��C�p%;���|37pYaqu�)S����\�-����?Ȑ�9i����C�)���x]�r���w�ٖ���@�B"q%N�e�F��}��ΐ�.2&�bN�7{BK�z1�n�YA/�;c�𾑲��ۜ������M��i�2�H�iG���HM�۲���g�2G�^�/����m7��V���I_���2zŝ˖l���×��>t�)�3����,�e�� ��Z�    sO(3SV!"�E�#�i>��>���	ف�m�r���c��I�*̏�ī�B������R3�]���������T�n�%�.b2-Ƙ}7ץe>Ǚ��x���M�e�on�	�O�����O7ܽ�0�J#�p2kܧ�3o��ө�4��Ng�]��ú�zgW+�,R��5��n޲z1��B�n�9
Cܬ$�����\�3?W��`x���������n�Wڙm�=����T�1"�1�-۞���g�ҍ��
`����I�:�����j�^�ڗI!�2���;���'�H�1��.���l��#Q��Tq���1ՠٿ{B���e��ڇ�t
	��_"?��~b�G��@���l�6S���#��S�˨+:�?b��[Ҿ�7��)֋��D"`^/Ya�WR����>9������'�����"����������eՇR�7}9��qd{��r�>�1O�o^�DKw&z9d���*D�VfǙ��#Q/=2/#��>��2��n7�hn	�����HUO-E~�9�6Ƽ&����Kh�]���^�_��Ci�Pƈs9+�ﭟ-�aW���CJ�[�@���/�k�gN�2����E��*C'�B)W72X�R�k����X�`t�51b�h�����*�E��B�VH��͌�����a���Pkg�Q��Ԟ��o*�t��n>�%�����)IF�?O�t�k]�-s|��"��ʱ1��ܫ=ʡm��ҹ2��N#��ϯ�
���3��B%Y%��<�\�
�]��O�h9e��$���;�!�7��*�~�p��6R��Fuh�A�o��\��Ya��U���&ǵ��3�h{��-�o��?#�qT�xz��J~��8�	Ļ����,+O�{�h�W�H�P�q��������0B������6}-���O��r��$j%]�~���Z�� ���'�z�-��d$~�$1��=;��ig{0��`�	����7�����g��;mK,z<Sb.�S�rˬ��	ϥC��( ��|{��%���� ��jZ3�u]Mܥ�w�IEZܳ�Yiz�G�12��(Ӵ�ȸ4����h	]ǢFJ4���C�-�(Ǯ��ix��m�h7+�S�Vh�ku�2�G����vƉvZ�i�S�8��"�b�ZK��̙ztie&KZL��$�V��p�b:�Q��R�z3ߧ���L���5���k�{=�Z�~���N:�,�%�>��]�b����@?���U��)�[p���?f�f`�&@T���}���utxإ��>�ˤ�@�ʵ�t5�m ����b�2�L������D�i��|+zF?X�k��Þ�3�C@��e�������w��C{�OS���NL�N[���h�|z�x=�C�n�-&��qh3y��� 0c��0�����S��6H��Rj{X�gh	�w;P��~c����.�GӰFd6�.d�[a�����7c����t�-�ά�ӷ]V���)��:���KV_��^�WR�(0sG?� ��ho���X�I�?�12qhhk<���B��V��x2�v�7F55Ɍ҅��uh����}�퓕�!n�o����_�u#}��m#��h�wt<.R��"��Mh��~�Y���R�4�	����k�b+�4B@��_�~���5Sp�4Z;�IQ�l-]��*����7u�%-��I�~٤_�86�_�Я�rڣ�7߯��C�[fNj�+��L����6��4�v��(�2�_%C_��
�)��tx��1��_��hV;e4�NT�RZ���wh�IOm�m5LRe6E�ƫ�͡� ��d.�{� �viݗv<����Y�V�v�"�o��O�\O�%��)ٗ(�|�:�m�S�h�h��I�貓�쮋����Ok��żHD�i�D�I�x�Ç<�'�ɖ�#��%<���M;�p�"5����}^��e?��p����f*�
m�,q��2�Grff�<�ҪaJ�o��AO����t��a�7�q?Nr��-C���n�bNS��XGiS�k;͇uQ��Opl�DW�K����ځbֶ���6�-���a���#�Ѧ5!��uO��nߠ��̖�#�J�.i�8|�ށ�C��ؕa��mJ��>o�8-!��D'�ڒP�Ɨ���-�����	�E�Z�[Z~~�`c��b��+M�"��-����R�#�&��?et�!����rȂ��'r"?В �B��Yn�%���4<�@���܆P�J�
+��̛��E�F��,�)�GѬw{��֙zI��CHc��Qz�F�G��Nt��?�w���Zk�<�A��&	��q�jسMuMxpMH]l�o�O�\O�7˨�O�$/�K}R�t�P2��W���0y����i����L���>N���L���Sl�8Je)j�\�:�ିT1 ݜ>�v:�W�Fg�n�@�^�[��e��������/�⓽�ȼ-�~x�L��>U%���]B��M��Aa.�ܒ��,݆��[B�Db"�<���y�]_�o.}/���d����ЁN�d�����Q춖�8�o;��L@�Z��%�~�(�(����"ȳn&��Z"�c��?���P�	ڻ�1;0k�޳�!��g����N��k��!k�!��2(7jyf������,�&V��/{��{Y�}�H0��8J�[��-0>E����W���d�U�Юi��CK��
�?��~�WO�x��
M	L:�w�)~�uh�Q	�f5R&�����Fc]2���Ԁ�o�(�x��8bƹK21�;���tY�W�ke
���u�u�y���-l�L�`�.��f�	xʁ~dA�F���ݖ&���f�M`gf���nGx�^�ӟ��k�@	��
Cv�����#�s�����i���#�)���#9�`_d-q��/������{>������*�?��+G[hHD�YVF�}�ʮ���A�d�}d�$�eq�� ��|oj�h(u�P�ޝ��^h�?�/+(=S�m^���{"}���;]㍜/_�B�T���gF�W'+p�w�C����ORc|~�b�a�o��Z�z"���'���l�2�bޭ�@%�4t2��2�=����v��ֺ�[�iI�q��Dd=�:D.�Lɯ��_tC�o�-ͳу��Q�8)l����t�I�mC�q�{��̭���f4�Q���{�ơ��E0s�u{Z�t��B���ЙP��ڄeOc��3����[����X��M��+��N&�5d8a�$u�̻_�	����_�ʧ�A��ye��A_�h	��U/�Ѻ�k�'�M��tt�����20�͇��Z>�?Kw�Jϴ�����^�s��W�Ԍ�:M����^��xb��}	b5�f1���D�eKg1/���fW�����Ɠ-�]D�T�bb<�W�8���,j�I7ZaT��V����&�$����Ό��n�8�� �#�Ox�y��H�Ju~����&�EN����k���r��,��VR��T��,��|z
�����aͫr��g�5)6�v�MVN���^�z�>�*N��"����kw9Է�be��P�K�������^o��ֺ�{z��s�J����]�C�6�9�!��'aa#T�$��!�'�~�44z���>�Dy������bϻQ�{�f<���L��~����lh)�
��J��X�x�j��hO�ܒ�O3U�#n��Ǉ}8=�g��ʒ|���P�C;��6O7m��}#�E����{LF3L�\��#��������lAF�q2�J7�2�--��ka@(����WH��;O����<snn�H�o�c(�ئ��R��=dϠP=��ʪ�C�`�O�s�7����f9�xQ��L+�9����l�j�G7=��a^m/�h)�LD��K��NgJ{�h��^d�lɧ�c��կ�)_�\yr�������RoV�����5%@�9�%���]��,�|�~IvN�@�gRM�c�M�[ś6���h���12?��I�uߴ�{��ZpH��.��[��*�)�8�Dej���Gb�/a,S�D����)eH��M��Z�sk:sL�"=����j|w�<�iߖ�W �  *����7��jKL� ���Fܺ����C;�������A��8��f@��$�%8�X���Y[x{m�<ę�]�l&��[�@�Hc+~��IER�\�-oN
���,��֟���^w����"��ckhR���V�2����̓O��Ik[�İ}�9����g~+����6�����^�4��|��\-E���̍j?���-���ڇ��ՙ�}{С�((�v/.J�2�SVć=�$�xw���23�*��w�n��c5�!u�A����y D;�Nq��-�F J�]l-�v���h�P��m/�ZK��;ӏNwb:ʔF����:o2/C����̇W�-a�L������T���B<�,ZZ����(�cΥ��/ZX����|�i��V���,Q�[���?f�M�U�~Ӟ�Ȯ#�1&h�ǟE�_�W��X9���TY�O�����>�f#Te���u�`O~�y�?�u=�4x��[)�{�I҉f�i�ע��'5h0�e������������H�,�Sb����+�X
Ε����࢝��ob"P�$�3Jȯ���@{3]{�L��Qb�wߠC��
�M_u�e���=�9t�t���j��P�%�Sn�Ӝ5Jp�L�8����P������?����-��u�@[���X���5�Iu�OB|V�O=�g7$��]�!�	0iM��#K�?�N�R��E���I�ZD,c�jTJ��:a&��HW4��m&�X'p-;ژ��_���{9����èI���?��s~U����f�-��W�ҡ]!��'�B�p��+:�v�� ��U
_f&�Hu�����E{Z�.4��2�Wc����^��ˡ�'I�7�@ѷ�H��*�(��7S
��N؇��>HZ�55��s2k_ՠ�6�g���>�ǥ�p��#\��L�V�e�Խ���U�'�v��`(K�h�v�����!���3ā)�#<Bb�O�5邿'@X�zn�[b�trHtc/C��)Nr�TH��D���{��]4J"�YB�:.	�%��]�����ȁ��&�/P�.)���͉��ܘ'�\mjٚ7b�֟��(��d�Թ�l�����#_w��$�$_\7-�O@�a�jќ���V��flr�[��n'߭���w%����r����4Fz{��m��yO�Q�	mY��[4��@�ERq���.��d�a�4�;s�ʢq���p���Io]��}�1�꽿��VJ���Āp����r��z��A:L�Ь̝�N�oS���Sc�1O���)�����k�M���	����f�_�'	��U���y�^�{o�hU!���b<�.Ū��}~��}�K���iĜBx7?���+�U��C��9*Sޘ��ΓZc��ĞF0�����/�qz��:��<%�G�y������43�N0rliM�ۮ�?�r=1r)[�+�l"+c2����e�$a�/�}���Y/��^��9�?�u=7���KT���Z�^2$7n��TveзlG���LP.�m���x�gt~�o�)��=!Q��W=g�ҁz����>�3��1����-�{lL�i�<E�Y/Y���Y:V8�~�i�8��(��;�;q0���g�L�ofbY|7�'5�e�#(� Ϯ����--�M����.EE�4#�-��Q���Jma�>�1hX��d�$���ZڵP�;��В|=f& .�{�F�� �0^%�F�X��-�v~��'����&�� �(����$�h�,�'H��y�g�)=2�]#]�V�I*c�x���͈�����2�>�1�C�U�'�}"�7sarp�~G��_�W<�6O���9/!C.�>](�4�첊�ޡ�/�?=�ed d���u�z�c�߁TM
���2`��v��h�#��L>ݧ~��F��O���W?;���.)�=P����=����?1�n}�W���=3�杠m;��e�4�Ɠ�y�5<����y�뉋��#>�d�zF�Hֽ��$[zj�l+�γ`Ġە�^��_���d� �M��>���2��`����5�����6�^h��:L*_1'���v:Z<���_�K"[:}K<���9�$���&��;� ډ9�����~�.����If�V�D����8%齛e���� �ET���]��S���:��`�nb���+�99�6F�˿�G%�HEk�����ƾ�koW��bH��A���%�Z������f�a�뉉J�S�,�#\KnMhŅ���Q��4S�>,�����i���Righ�)���%H���u���i��31���t��;�3���H�w2R.�l��l�ތhe�XY}�8���M����W�2�W�jѧ��m#���ُ�Y ����bp�"7wd{�������s�T����e2Ϳ�aw)	m�V{��N��6��t����p>V��}�q��Yb�w�C�ʵ���N�S�q8u�P����oIδ;�T��F���rE��ͤВ�S�m[Z�vMY����|�K���?U��T��ˎg�5�k�9y%���	�P�l�3�J���<�$_�ʏ��i�Dƣ��D��1�����Tˑ�̜�qI�b�FmОٜ��Rg�����|�@���|�İsț���_��hɘδ;��%�'%ɲ�k
-��E����*ɕY����|D�����vAbܕ���4Nk�Έ���lu3����{h3ɤ�Aht-�e�!�$��-@�������i��7u���i;�6!PĮ49);B���V�-@����\���)"2����p�~{���[�`z2=d�RK:�{;Ԡ]qì�AjH��j���5�.P&PL=�4���7�;HS�*�P-3)]Jڥ��/]G8��3�ù�����@_A"���l]Y��_�l� �����~���F.������~�ؔY,+��+	Z��v:�Q�#+�S-l���/t����$P��}�i��`G�wFD�Y��?��i�aR�gڭ>S�������8&�
�[cd>�x�r�����2�G�|R9RS� @�Y��2ۤ͝[�]�T�}�>?��~;}���d:� ��d_֛v���Ԫ�40Կ),�~�T�U�'.���GG�����+�k\ǡ=S��tOr�C3�d~η�����!� ��e��p}_vh�QiX(�]O�U��Xep}��LG���"c76�.]���ƹ���* ��q#�3W����&��RJ�rݬ�l��VZ�՛��PȬ��I����Qz���#D��q�3©�گ�X�z��Ө��w���4���>0�~]Ht>u��w�������������8V      �      x������ � �      �      x������ � �      �      x������ � �      �      x��׮�ȵ��{��/��by�II$�`@`s�H1=�)�n������/����XU+p}�J����>'����9=b��O�{��� t|��(��kQ��T|��SM�	A B"����4u��W�����0w�o��y�c��Όb9<�]�5��6*�R�|9��R��R)V=����bj�y�4e��N]ԪH��>�Bgk}e�DJq�>��ϵ�_�:�u��������\�*�͜Qc5��q=pǀg�˃3�c*�h��4#ν�*2�~\��B�d�#�	Z�� P8�͢g��TL�0���?/����k��?'}���]?���Yv������e�����L��o?��Q�|ʶSKI��'��D+�Qi�!�RiU,��U�E��B��R�\�"hU$�,��5��M��]�D��@�3�9�.b�w�3\fH0��U�����|A�*@i$���Ҧs��chU���Eֽ�PV�wpu�7�W	�7����J?�V[to$�6�U߬�@��@��,R)mcOl.��$��
QzѵI}�IZm�k6qg����R.e໵R��j3��^�bv�f��!Sħs����o��v!/� _i���A��]�"�{����m��=�O��.�u-��NC����m���>>�u�o7V��qm{�������:wO���[�f���~��2����X�k��{�3��s��/S��_�?���'�p�ʮK5⊢�5n��)�~�K��c�A��Я�"jsЊ[��v0IZ�x���]��],�H����+��W�}�u,�5<Mqe�պ��5Zh��5s�- 4bu���dج���d����&�0�]��4%�C'{�^<��']�M�Я�C��}�'"�$����Жf�ܿ�;(�}�q�%����}�����7J�P�VaL�Mヷ���0�ρց�<��z�rc_���f��ڧ;�=u��f�Y'�n���S{58�R�&�ГU?���Knđ�{���5 �Ӊs�؂��=0��U���eϏ�"6�?D���Y-��1�Cə,�{,�,=������l������\]=$u�E�d��E�;V�r�L�?�ԙ>Iw��i2��=�t�5��q�?e/ĺ��Q����[L<˦���(歀�aG�ܟ�`�.��Ζ��u��]0.ΰ�;�K6F7[v�O�ȹޥV[~T�3V��'�Q�S4����理����x� D�<z%3^����H������-G�=R��#P��q�H4��IP?�N׉��-1/�aT^g9ƜcեL�|yMs݀�ؙ*:� #6x�"43T
�c��Ʈ��,|ݷ{He�ҹ۝m�g~ӷZ�-Xw6�E2e�8�j�:E�����<��H��Ű*�z�Y&��� �, K$=�:�뮀|���rM �q��Wŀ,o�Pzď��*�HX�eth;[P�k�7�V)@�Qw��X�]�5�Y�*_���%��%���v4h�n;���V��}˒�+���Pj��.�%�K�.���/�1�YY���1a����X�Z�(���9!�{�<���K��M �K^6z�����f��:�o[d��q�S6�)��9Q�.ºZ��C��K��!N;,tO���|D�M�N�����c��y+���i����q�aa��Ӽ�߿�<�9>X�󐳐�p�&���l�a� m/��<~�dG� ӗ���J�Pt('��� E.�2O���n�,0�r�ܹ���ugD��¥�{lW�K�VXn��\|�_�]_z�h���w�`���b��I�=/
%[��i�n8E�A��R�^�#�����!�'���Q������4�G��ًYP�Ù�`��(�e�D��tㆵ�X��#iVz������dm���t��;����3�����}M�<^xvP�'g��pGԇN�|�h>�8Ye��E����gJ�=�D���#�Y�Dz:]	5	�H�DI2�D�I6z� ���i_ˬ�� � � �A)���0�eS��y�G后���������6-ឯ�x���ZH}��+ͷ��(�q�~1�nx?�N�D���f�G� /��Iוֹ9j��V�^4�L4�r_�ठ��U�<�Z��UHm�9ڥ ���"�)����j����|�$���b�"˭�@� o�@V
��?)���"P��P��� 
삙M���H�p�EҊ{+x���!Iꌋ�"���
Vj�)k�&~K!F�9�XVY�.��F����H���Dj�Tv�/� )�^Rs,���tq"����]�rݓ��Yk1(<t
��@�E�Ӄ�o⦊볜�g�:�F`��)��w:����9������
�!U����\�
M�~U"��D�]�4�/���yS��0�e�>�#�{f'9},�Q�a	�����^{Xc
;��I7��Ş�}���/���c�D������]yi�2d�?��I��㊙i��z���,Rss�h���T��A�y&c��]k0�c��J�R�nE�R߮��$�ɐT�?9�(wi�P�PF
�1P2gQ����x�'�R�a=�4r��^J~ὗ�QG���}�����;��s|�ֻ�ى�aA5�==w�!oB�2��A�r����sg�OwJ���5����j�(h���Q��-K9�e@�z�e(ʌJ��͖t��� ���lykcx�[ ��PJ�8A ��l�f��^TE�U,SՏ-��g'���7�*�:]�������zu�'���N�d�3�Ae�sz~��E���S��t}�Lw��t�Ař� �W��5OY�Ғ��j��:t0�g��_gSo�{"a��|U(_�2ҹ�����r��p��f��-	��l�`��&�W"�+����5�$`a����*�t���[uO�/W/,�=�T��6��-�6[�+X�V�w6�V�f��M��-�9@�v��-���p���4f����W�~�Q�V��X�*����d�����c�*E��lʅ�N�����ɭ������ ����w�����{�UB+��C��
��P�|��7��B�Ǝ�>��w,4^���T��v�Fr��P��@��Z�f݀	���턟%2Hq������,b���<�v@��-jў.�&b�xH���)�^G��\��b�ǧd�����G'�n��=%���ȵ�����{��~LB�p��[�X��c�g�q2Z��3~Dw�S9��{�3+_�Y�Ă꬇�zٹ%��%��l���F49�K�2K}�qbUW�~����1)�Ά"�,�y1�� qu�1S�����U�=�����Ώ���l(�4BԌ��S�o��t_~��.��:�UW�#|�����1Bd5
G���k���.�.N�M�MQ4��� Q�P��[�a���]^�����H�m��h�I�P�G���y��
WV �[��5G^}���{���v;�w����`��4�2���� �;y}�d��"��4�z��E��^�G��'�sL���0��:5�$i�H��,ؔ{Ӭ���m�2�
7'�_D��Is��AR�%5��	� v�
l�l����
[U� �P�v�Ʈ��� �=�&��k�9��9��9\[j�=H��d�:��L�R��MB�X�E
.EO�&����\q;q[熷ộo�=A���q��ʪ���C$г�}l���!����A�ڍ`����t��5�/@�Z��'W&���_�w��J�$0� S�F��o=n@�;oa�c�k���|Q�G�f��BH?Ա5]�	B����ō���l�ӳ-�*�z!��qfw�o���C��F��@��2_��h剬�h���iޕ��(�S,uC1j�y����Y]_�=c7w�+��1�]3���\]��'�*=��q�O����v�/�5�{�	$7u�,���Q�su��Wm*(�u�$ȕ�)n��Y!����P%�ʄ��A-�`VSp~n�|F1�i7�%�mCL�*;�FDw$�c�^����st����p{
Og��I��}�Gu��)pGJ�|_�Ñ�F" ��=��۽{����Q��:��#��(�`?��� �  +����z��.p���P�*εS'5'=6Åh��M4V̼��1bQ�Y�W,yhS\ҩ�>d�:�v�Bqљ��3��K��~�CiIL���O��!E�a���g8�]��SL	�4�;vT������7<m*����ۆG(V�:����P��ӡW�Bf����r��
(<0��v�*֐#,��n� ����&��':olo����!�}����w��ЖW��P��W�G�b��鶓4i��7,�yb�)��0Q���xn�mm(R"����I�ZMpX�U[0[�K��jJG4��A�`7�P�e�����ڄ�兵%�Op���6�͘���'��-�~�egއ�07��WW,.�Z	0W5�3�zs�n<h���^9�7*Qk
�F%3�S��G��$E=��+O!�s�����*��;�Wj�5��,f<�J?�����fξ�\�F8Y(��\��2ܦ�.��B�ց�0�0!��]�-f��F�����UJ0��2�r9姒S� ���<�j�b����6�9���0�FV�XQ�S�5l),��p�&�x3�k�xνN�_D{��s{\^qTH���Rm��ѽ�R�b��2~at�]'�f��p�ʒ����ѯ�������~�_1��      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �   ?  x����r�6���S�����[�6M&M�c���/��H�@���s��� }��@_���eّ]�m�L�
��X�"-�p�	d�1^Jl�M�fպ��#O�<�ۚ�6�g,S�i�q�a������>����Q�~��/qr�C���(�����~���#�"���'n�x#��S�y��y�B��&ͽ+-*�V��z.K��02S�5Reh!��y�>|�X�0��$ �~��:+1���FY�Hp�{J�٩i��v�]���胨�� 6�
�0�3�e(�H�y��#	w
�~��L�^A��y� ��Zd�U5�=�y�]1�l�૘���,G�)���}����K��A8#xB��ޘ�&�tW�|Q�tuM�{�����X՝���zUZ�\�����Vߪw��u�2͚\�ƙ����Hpias��=�Aׂ�-Z�]i��sP԰L���o�V��!#�>�F.rI��Y@aW'	��\M��T�clS�>%�ž�ޱ�9��8Y���n�
V{��hj݋z�Tm��T���^#A�T���Z��VFvB	c����U���b��ۃ�7� k�-WB�JTL�⇲f�w|��F�Nf�L����)	��:����a˕��&օ1x���6��b�O�X��lŐ͇w�8+!���l���ז����Ow��-�J.���-�\�5ӊ���j�p"��+�O�L�Q2 ���=�BJ��f�tEH����UMt�ϐ��A
�E���p�
�����B?�IOSn��.����/b��ֺ�����~2���3��:��x�4_�K	�|�I2�)��	Q;Ǘ⢶SL��� ��(��z�.P�FHfA4���7]�(���7g݌]�ޫ;$���ڲJ��u�>k,����D�".�5HZ�	M��ou[׳�Xα;IP��KU5�4���߿��m��C�2�j��աo���?��-�ִ��~��r����{`>'�H֠e*`��13d<�4�O��̠S�L�(>%���M2�g��B8�r��ѣ=��pda���H��1=� �+S�*~�~U�B��<&�p]vI�SI�lW��Q�2�rA�!�}�Guce%w�;�J�s��Y?�H��jٌ���F���Ʋ��]�����x���W�S����['�3��F�k�U�G��we��`�r7'��9#{�$����g�V��8���.K-$|ݫ���l`�TK�uK�w^�T�ӟ�Op�͘����-2.��D�x�t��p����E�NN6~.�K7� ?<mY���N�h��w-ˤ"7Q3����+L�	 }o$H�ͳ���
��QӜA8�@�I@���,������?���>      �   ^  x�m�M��0���\�TKH�e��2S�Y�FH�G1 �Oi������_��������Fu�/V7��֪V�r����g$��!S.;Ͷ�0���h�Li�!IID�g�b�6w��&�� )r3q��,�\�?oǝ�'_B*ѳ\7�L��$EBP�#�g76=@6�F{����{�h�W�g:��쳍�H ����ہ�w�MݸZ\%��h4�Jv�Fy����\u|*n���A�خ�q��F�7�ik���l����k��)[�4.���HiI��()0{.���iZ '����i,�,z�$?�\�xVӹ���W�F|Hx�8	�ڋ���};����(!����; ���gs�f��vJ���U��%���݉l֝b^��D�E[��?��GR�y�e{�@0�PQ��늰����G���E��!1	�PT�,až�f����ꓗ[RI�]�6�˶Xv�3�}�:U~� WmX!;3|T�<pE����IX���fC�;��YL�UK��i���[��nP��/����=[Z��'t�¶��ب��7�a�r����ѫ�7�H�W��nU@v]��R��'~�"ߓ����)fl      �   �  x��VI��6>��
^r�.Z}��h�h�(�����(j-��ޡ��8�KO�f43�|�I�]��Q3�iS����ѱ�����<��_��$��ID�ͿJy����NV����;��so���<�X����ϮR|rg���_�@�ݻ�w��hչRm����n���'��M�C��[�K,|`���h���u�y�Cm�\��E6�>�?QL�gg!�\"z���&�C�]~�0{�4sU4OW�a���x�*)(�O�'�7n�����^c̤ϩ��8_�	����S���?���_Y�yj�����74%oh�FX�GRZ�e�8���u����I�(���-��D����V�,k���6I�O�-��wU���k��u�g��z��ӆ�N�~-Y�����=b���IR��M?�T�c�>�ԦrqM%�FVQ�Xϋ�%d+�y!a�r!Yf�C�]f!�a�(�nN��,$�+h��Dk�Ťi:�0v���[�sS��:x��u�O��ܻ�Ѻ�A
�G��5KW�Z����=&�F�vH�|�l[���J}s0|��{(�� �Μ͢e��1!�ӄ�� ɑ'�h���4�P��\�r���T���vGVMCo&�(�jW�J�g�j���@RM�4f�|.��B�s%���p�#`cPm[ZA��Y����M��q�[-�=@+Д�C@.�X��{���&��h ����PPBUq�-�YMW(>��U��[�)�|2��eU����>�r=g@LVfR�y_?5?~�_��f�K_�(|(�O��	4j�J��P�^�(����Y��D,�&��{�]�eg ���`׬v����-�	>3�G�&�Y�H|�@xQ��js�w�ri��K_�My4M������CNٖ�3�x����D��Qk��aVz��F�~�eY��9+φ���0���r���#�>�i�|�u��r��_F�]	B��_R�Z��;[��������8�#  a�K�ǼZbz[t�(��7]����)���D�k��3ń>���Yn���>���7��W�C�C�,"�%$�g����
��"ag�d�0�I8=a��_F�m�q�Y��s�9�cv�4uՁ&�r&�5�|U����%	��H}�Çc��x�ךڭj���2l��[��d�a+rj5�p|����(6�]o9�aג����8�.��h�,�"ݿk"^�b|�$�$z(��0zg��i+O�>OOO� �/a(      �     x���˒� ��q�0�Q�]�D�DA�x���I��*��g/�2��R$�6FwBW�d�"Rݢ[��$؀�i�bw#����f[����-��Cg�ܔ�}������9��H�'��vI�;_��mEk������u��&�����W:��ay�<����,B�n�mY��c��m
���}���}~�����k���'��^��vu��a�U�,J�/�3�,�)��M���&�$K#);����r�kUN2�<�ȡ�`� ��;v^t�`��<�(�,�����X�8�
Ej��c��ƽM�οu�[Τƨ�;�:�i�<ab7�-��L��]����,��L����R�|�.����<��(QC%����{�Y-G�������=;��]����I���W���n޺:��YG]��ZFa�ս���֢�!3e�"�
�i�0�a���i��)���`\�fCv�t��q�����������
��c�S�&�ڄ���όF0�m�����O7�m"u԰1�<���J9g���Γ.���w�߿ Y��      �   �  x���ˎ�0���S�A���:J��s��T���DqS�H&����0$3���os�s5���G���{o�r�rҬ��2)nZ��X��Vl>��yy"�r1���G�	I �H���\<}����.'�R����, j��������|�x�x���"yy� ������:B�i-�ݮ����[��5iP�<��l��`�*3C�gD0�8"d�Re^����L��靺��4	����J�օvH�BC�$�?!�f���w�r��^�n��U��������:~��.��wi'��v�{؂�J(��e]��sq�j������5��^�H��!�t� ��p�Ǒ��ʥ9�@�sC�P��qț�:>��\o��%rwZ�e�:��#��Xg/Lx��ȗ��TѦ�К�z�����j�@���K72��g�s��A��Am�p_Ƣ�n�6 ��ѡ���+h�p[I�.�2��f�8�      �   �   x�}�;�0Dks�� ��M��(%�6�cc,���> ���ٙ���f��c�VC�2p������"�*�3`�𤰔���%����@�xD=h���H�������D�h9X�f�G�-��l8���j<����ɬ�ȖLܚ�ܚђ{*q!�>$��c`��QU-��ڰN&I�� Q�      �   �   x�u���0Eg�+��G���"!!XY܇J�⠤�=N*"�,��8����q.�NH=G\8O��c�Wtȩ�+���8[�l�3��,������89$��
�C@�x��5;H��W��Tb��Z������)��4�{ƍ���J�Znoq��B��U,{�߶B�  Q�      �   Y   x�3�trvcCN������b��ļl���D���t.#N� O0FWP�	V`���	��
�!
L8}�R2�29}�\<1MʅH���qqq k�+�      �   )   x�3�tL���SpKM�4500����4��rq����� ��F      �   L  x�u��R�0�g�)2us�@a,׻2��Ģ��&v�v���#˥�I�%�I��HJ��4���z�D�Z�I�i�/vtmg�����L���YrZ0�$�;c[#��}D��?d^�b�\D��t):G�����2G̻�^MנO�:0��:=�2��q���މ���T����D����!�,ʄ�x�<����J��WߋG􆇷I�aE�9�A� @�s|��K&��R�� �Vݞ�kr�bXӇR�ϴ"�xG�Êds�m��@?4_a�QƽI���ޅ�9�H�X��J�����:�w�=:��'A�o*ۂ)|��tӠ��ʏi�e�o�&      �      x�u[M�۶�]K�BK{�y�2��s���tY�J�j6�O�E�(q����9�D��"��{��\�j��?�����y��Ž{��\6�Dg�Z&���}�d3���<�.��Z/�v��,5�ԋ7e�ή��@�l@T�n_���<]Z�xv��5�al��D���kH�ZW�ˍ! j=`�C��,E)��|c�'K���a���(3j�[�'�<�)�/m�P��=�Ea��As'�
�i3N%
S��N��TV�ڥ��/n�CQ��k��R9d5��a�t*V�

����	H�|,D0�5d�֭�Y=e�Nt�ĿD֭��(�ν/��2IDNA1y�Yk��B>d��B3�>Xp��M I	��V�d*-�� �(]ݗǾv=0��t+�=V3�iU/�|��^ �J�I1".6`h�z=bF ��K�HM�Ow.+�ʗZT���hW3/|��{�f��ͨu�?�����d����� ;�S�L�J٥���)œ�6�W��𕢴�+��T�	}A���}�H����4���^^����k�ai��cf���$^�UU�s�������ܮ�{�:VC�1#d�P5u2�i[&A>\D����0"-�P��jiM�1T����]�0�S��t�`�j����w�y1Tg����;����Qm�4�_���h���2���_�va�Qb�)TU�W�o*�k�LӉ��(����uu���^@�I�E:�� ���ǡ���B9eSv�ǲ�n$�<[B?�N��Sy.�H������H��,�S0C�˓O��b9S]ꜳ��5��	J� o<!�~�Q��DM��Znh5Vn����ä$	�<%V�t���mV\E\~E��[���@�%VX���K�T���H��UՕ}'~�`
�s,ҔCBE�����3�ΦS��p���Pl�ry�Ѻ�<��������D�k�Єt����Ă3�.�&ڷ���h�� ���vt�ǶٵͶ}_}�O��,�:���������xk�������s����7��a.Pp{xq�g�J���s�YhO��E�9Uݔqطp�<ъs�,��`�ͩ�����@��˂*���Y�U����'˒eA�`hf���C�]�R�Y#a�/��~_��(A�6�`�	�;]�^_�uT�EJ�R��{h,^�ԝ��Yp�����>Ò�e�.���z	�6Dٲ�����k��y��L���9
��Zd�4aX�����6��f��N�p4�bR@��+�姰:�#@h(l��й*+�������q&�g��0��pA���,�Z]�EF���;�oK}q_L���'CQ�^ܹ���ė�$`�we��
�����9��6'3H�C�ݖ��%e�B�qW�>Zm�������H������˅'ܕ�vBF��-�^�B�ȼBʁ�
A@�kw�t<�<�9Ĩ�� �[�kY;�.6;$j0hEX%)T�%.�0��H�wQDP�)�I�5�2J���#~���P7�JG��H�����ZL�`I�<�.��$P���!|ӷ������Y�>��C�@SĔ狯���K�2\6�����V��-A	��@�\R��@|� F�]�ھ���^|�ʫ}���@ھ�B���N_��e�}��U�9�	�`�<���Y��
��#N�z�I����<h�ﮆ�l�TR�Maz�W؅S��Bx�z�U�˹i��7��������G��^�.%�zu�!�fZQ`S�0����@'�ȁ0�@��
��w�)�O=��y�!@�5�[��l;�Cl[�^�U����c>����PZ^[x��}�Qt�v��L�C(��LF`���u�q뇸�Й�!N.��4�SC���G���$�����(I�8���nG�Q2|��E����P`#\ϱ��5:e�&��υ�"z���
)�Y@D����2�r�0�J;�aA�I:��o :G�6��a #��㜟bE !ߤ�����0Xd�~�X�;���ʌ� T.���q���B�Ns�+���B~%�7~�G%q6,�,�]��Sy�"q�1�����\鑲|m;��	�����>r+%#�7������[*�6�W���@V�;\|N�U�/_�C�i#�
�r_nY���f��T��6��,��[����l���[
��n"RVH�/�,�6�*M�`�>h�w\�n�_8�"�7��t
�W��U+0�+�D�ywUT��jr a'�jF����a�赌)��S^L�eW���x��)�H���*��v�gÚpF޵�O��vF%j:@_�2bP���
���Fˉ���������/� ��ղR�ܶ�j��H�)����p��s0S�s_{���+��sO6��������:&2�b��&$�t�i��{/c���Wv�rA%#��{�i�����=��A�D����о�&iL�=�}�S��!#F�����[�F�AТ��I�v�0�4��W?����+���m3�B���,v�Ե�a��	K� �J!1�؋�D�;H�ɫTXP*z��Q�T�����W*�=��؝�~
� �B�"����:�͹����'�OS�բB�eb�
��
8��{�#�ļ���m@�fy�S� �P*-��Q������t)n��"*�6��`r|����C��e�hȌ!(�� +�ύ�CP�l۞c�-��">�����M��h�|�*\�T�Q�|�k��a��J�Gl)��/�Cb(᜜�<T�
���ݟJ�hD��XZ& [��P���
��_�2�Y�%�]�\�8���Co����H���(׀iT��A�C��P�3�#��� �_�I�b�6T���t�6�N�(����L��l*�q�aa\�J��"���.ݶ�c�`!��S��X�����]YϏf2���H���"�h�	nD�y浚Xn�u�r,�T1b�# J�]�����j�y�����������sE��8�l*��EJ�G�U�(62�PR��=��͂���OX��1�� T��$[OA>�G�!��TC\��q0�F�� T�$���$3C(�i2&4��LP��D��QǇ����%V�e�t4�C�Ψ��m�I+���FH�G���HSǜ�`�̨g��*�E)�g�W�&B�x�U���DK�6�EKL %�X}\;<0�>Y��x����:��b����Z�=\ϱ�b<���ǋ�1|�ZT���!��c.��b��U�~x��`	�@�����(�����&��X���*N|�@��3������z��~f�����J#�ȁDYЩQ����Bp���8`+I@�.���K��&�ؾ���;��G�Whp� qG�àG�m׾�'jJ��@�{z�oMu�(WC�]]�=W�\�H�~�}����2�����$���<��_\��?E��?��~rɁ4�ʣ~��?�A� D���^�.6�<��4H�w�#��ne��i! �}��.�ij0 ��3*)�H�������%C�Y|߹������a���]jTc�UF�{��Љܡ����F��r��Ȇ�#`��F��t�0H˂�U�á���{��{f�0�܅8Y�������24�
=�=�b�n"3^����?�>&L�0�9����D��x`8<�ZƷ�'�Ou�8IE�C�ϼ�c��ϫr4�6�
C��L1�oS"Ո|����,�/��
�*���7��#�4�6ն�Fzd.�an�k���T������G�j����a�2�j��	�4[�j��.}��)�tB}�����jJ\2�>ٞo	JК*<���ޘ��a�\�-wRɅ$�Mkj��q˖jt���;� �RcN�҅�7����	�����iDiM6��L�w���:6����U���T�dg�����"�U�ǖ�ջ8;ȭ3M�nX?άG�EB���P��2n�q7/�H ���� ��\2���}�Z;�7�(���+���rO35��S��C7��8�)�S������o��L�S=t0E�.��As(l�1v=��yB`�ٗ�� �  �N"4X�%|[��P~���fWw�^Ŧ4H�tX�N��p��۠����ڼ�!�/�rOթ�n�K҂�4��%ꆁG����Ve|��;�oݢ6*,���8�yʏ�S�ڿ�s|�,�1�w�ںd���͈����6�t��X/����waP �F 	z~��t�xi(r͌A�Ï���^'!�5X��ԩ�v@.ׂ�<�l�,h6s��z�Apb������yb���:�[k��Aj��W�@�_��0�b��7�����փ��қ����R�i�����C?'�#F	fȻ?͌��*� 8�]��ƇH�2@q~�AV��F-L�!�ŏ�M�����'(Ϗ!�EQK�5P�-��ͣ�(8B2B��ι�[P���\}ߺ�NM�+8�ƽ��钧A `��z��Z4� � ��V��%������ ��nr�������ˡ�1���Tuqe��d���Ng�4���M�Ƚ��	���u�֌۠6�ݺ>&�
��ݽ�z�_�'�'��5����Յ�M�6�n(�>M����q��E4���!��*���A$���#�]��r�9�Sj@n6� &�K��[GHT$'@��{��;��Q��`dt�*���GLg���Rn���w�օ�h�f��c~`��(�lň���ǀ�l*D����i�9A(`���y�I��?��[���uo3�M�3����h5O�4 {����OZ]~�_@���0�M��Ϩ �:� �����kt�2���Dp��&�!�b�ѐ?濤��_)��)�}��6�p��b����vR.����7]���D�������K�̰i�v��B5z�cg����'E��=n��q�]Śg6�D��uu᷉T*k��a`y^�^?~2(6�ە��]�bLgӿ̯[$���B����ȩ�g9�fJ��_E�DY�`�X��Qr�]ax5�S޾z�g�� PoS��yZq�	d�J.�1��S���
1����#�F��*�r�!ﳫ�b%��7Os�1����v#3�X��)�q��K��[h03����h���c�v3��)��BN8�Xc��L*��������؇���3�%��ﾉ_��P�0�NW�����ٹY�iyv�Pտ���B��-�[�?��;�|�Hۡ|��,/�B^W_����)�0r焾�n�!f�<����"%b7OYJ��&�B��uK%k��*��b�a�\ ;w�-�����R�>�s��MO�۳�E��^���~�lj�b�w�*De�:���F��2�)�������t�3W��L�;K����)�,MFU��P1ʌʦ��~��'+�+��O՞l�#���Q�1��G�h@h�˗J��?Z�WdK��<���GNL���n{%;�`�B��D���bn/�������	~4��B�t�����Y�噙s���'�� 0�e��'!Y��X+���P�tA��!A]`@m7l�5�� e�
`�#��smP��s����ڞ[:�ܾ��?�˟���<*`�^��_���s�&e{7�r*F^���׶�ʇ��3>0�<�V9K ��Nq�2���h���_�E��V���ϝؕ1 5Ϟ>J��K
PP� t��� hγ�fƛH8M1����[|��!
��<�ܾT�OVh�`:�������o� �X��<NO����}�;�gAm(?�/q�!m'j�{����x�׆�p�!�oHa�������c��C!�Jh���Z.��Z7��      �   �   x���1�0��]\E��b�DL`d9�)�������뻗/��c�c"Y�U�mн��b5��A+��m�Pu��"Ӡ_�Fj�@ě+�|K��^�L���퟈�8�Qh�u`N}���	;x��3i�*�x=�����[��ҷ��a�y���4R�I�T�2����"#v�L]~$��2���*/ל�/��      �   �   x�]˽
�@�z�)Rj#��K�k!��+�4�@A���D�8����OH�w	��FVh�����bs
���ϖ�֏���TZ�Rk�+lH'PJ�(E3*
�jE�I�A��9vX�"��c?;�Yjԫ����!��U��?�w���5E      �   �   x���1�0�ٜ� I����Sٺ�bA$pPH����7������Z����R�*OD��*��y]�i�*���I��`yˎ�0!��G=Rƴ��ҕ�HA�A�2�ĉ��sx�揅!����8d��h���{�*@�i$����͛���L��n � Y����]E�7y"      �      x������ � �      �   6   x�3���K��K-�L�4��63�2���e����\Ɯ��9��0�\1z\\\ �O�      �   �   x�M�M
�0����9AA��tWj]�q���$���7 �ݾ�70�H�tE��:Ƞ-!S���<ء�dT�QP�_n��l�d`�6�.��sJ�u{F _�a�u���0��������i�;Nt���~�y&����R�Ţ�F)��D�      �   5   x�3�)J�+N�.�TH�MJ��L��2B��*M��s���s��qqq 3�P      �   g   x�3��M�K�,�T�,*)M�QpLN�/�+�s��u�s���4����MLO-�OJ���υ��+�K�2�t��Ħ(��/)�ǘ30�3X����j|� ��1�      �   Q   x�320260501 3CN������C.#dcNC�T�,na�744	Z Շz�F(��g��q��qqq r
y      �   `   x�3�H�N-�JL�S�J�K�NT(H�KI�VH,I,U(H,*�P(O�.)�4202�50�54T00�2��22�37��2�bDb�����B��Ą+F��� /�"n      �   1  x�]�Mo�0�����]&�P��"���VM+;L�ś"�>�����D����_��T(94噂L�ʺ�D5�� �,9�p�6�l�_:So	c���`7U	<�}�X2-������5��ROE諂��BLeU���=oR�Pj�uˎ�G�-��Vw�[Ʒ�ò'���s�����^��ƛ�^ɸ�CN��&�Ae��`�OAN�2T�M��R�����[�	,��x]p#x���O��e�eG^���jV҅�_��M?Q�='���)ɤ&��Q����*Z���zB�?o;�o      �   Z   x�3����-���N,�THI�KO�SN��I-�4�2�tJ��T�IL�%�R��sS�R�j��F�>���y@�����D������d� �V�      �   D   x�3�tJ�)�Up�,K-�L��N,��4�2�t�.�L��8��S��9\�����`� 	*3      �   W   x�3�t�.�L�4�2�NMI�KWK-�L��N,��s�d�f�$*��&%f$�EM��%�9��@�)�7����S������ {Q      �   J   x�3�tJ�)�U�M�KIL+I,�4�2�t�.�L��8��S��R�2�2��3��Ɯ��{bzbP0F��� �p�      �      x������ � �      �   �  x��YMs�6=��'���䏣���x�<ɥHD$���S��.�H���egr�x��� h� ��؊��[^Dײ�$&�)�3K�y&7e�f�]g�۲��2��W�v2m��҇��"��&��e[��94&�BqYD_�m��ԴY��Ǥ8̶�ߥ������U�d#�������jl%5�x�aU�`�eH��;N�!�����#��׼�Yu�I�h��(t�U]U�̸��(�m�4y^RȠ�.Nu��� H�2-B�3!<��y%wE#jY֡�m�U��b��{=�D����$%�����W�\��t��$�8��^v�_��:��f� ����:-�h���W������V5�_@
�Lv&�CJ!�tD���'+�K�_�jy��Z&�r����i��-��X��Z�įx���	�lU� gϋH�E	������|�B���TFp��%��̔7�B�M��cne����t���G���=E���ʺ1��S�9-f=!f���}e������w?`���q�Z�ƎN��'�C���h��m�ԩqʤ�4>#�^עVb�� �h�,�Y��b2P��*:'O�6�EB�j(!�1��1�cA'}�2i-c8�/����dJQ��/Vʥ��E�Y(&w��r/( �����[��S�B��B�(��6z=r]�[��~�����q`Z�ϐ�v<4�/�������B�1��~����O�RUV���yҸ.���GTt-4tf5΃��Z֣�f���"i����t�$���������ШB����j���y.���^��I�21"Fp:_�Oe�����	ړ�h"sLT����R����J%MU�${m`��#�J�p:���C�m�xņ}>&��Ca��ҷP%E��s�$d֔:���יpC�$��\�"ؾ�����1˶wd��Kr�e�"I�h+{�##�1Fčǈ� 2���)yja��Aj��C��ƙ�pF�(u4]:*&@#oV\L�ꗺ�k�@�;�3b<����I
�S>�N!$[�s'�;�{y���B���p�$�
P�n�nCxh�)�I�Y�����@�k��T���6f��`v�7�����*�>��4:Sh�g��
��[�����AJڪ�`e-p�ttB��q���y,�W�X!]-�30B,M��G�
���Y��cnm��A��4�h�����.����a�ɥ�g8~����S}��(��ݚ�r�g�E���Ü������!:nb��}�\�G��*/I
mf�ǯ7 3��;��.b���h��ޱ0����m��9��w#r�P��_�2��{��Cb�k����H�m�3��}ێa?����N��-��� pP�� I�j���cd�����,3F��5��0��ܖk���N?a��!�y]\�{���|�It/����%qJ2�Ų�!���!��C�_ ,�r��a�D�P۹M�ԙ�Λ�	|�br�,�W��cf���eL��y+��ٟ@���(1=s#7 ��\�Z_Ѝíub\&I�����)r���[��E�o�]�p1�u��:	d��|�-^VVճ}F	�X��H�Kr�6�k��ڽ��y#�#J���YS�EUG�K(���/�6�5gí����OkC)rP�nL��s���O�nP�ɶ���M���|����t�      �   :   x�320260501 3#΂Լ�̔���<CNC.#��)Xք39?�$?�Ӏ+F��� ���      �      x��][��6r~�������ޒ�>8�u�6��<��wR�������5:{�N�حs�nv���F��u�W  A\Pu�v0I~�jɩ�G�	"nP!N0kB�	]�i��}^�P���⇿Du�e���Q��^��_��_~F�����g�����_�� ��O���0v�#����_�����?e����]䂄������������˯͐�_�ހb��g�!M�$���}����#PUG)z���$c',?9�O�!���m�cM2�\�=V~�X�b��cT�Q����W��7���W��QO��WB�/�0< �@��ҕ
��o��/R�&��4)J��(A��E� Os X���/=�G ����H2�)!�%<%ZH/)�_����1��KTF����)�.�.���B~�+�i�Ւ��bt)ˉ���K%�b]���������4�+��"<�O^�z,y(~�#�g����5�ASְG:F�BF�/����W�M� ��ӥ��~R)t ��R�r�qEG�_)w��+}%���E+m�����?���&P��j�I!�o�+6���ԁ�z�6��x򻇼���C�h���&(�j��a^ô���?}�IY��\�M2µ�!|��+cu�䦟�o�j�#P���X�����dmKw����Z�ɚ�z Nղd(Am�D	�0K���G�I]p����"�m�����&�T�79�]&k|
�S��ɯ��p C	��	H,��Bw��Z�M��n-����d�������`/�����r��L���NN�B��V�(�A�m�P2���b����/�9iQ<��?t={j~���W�c~V� r�pw���#�tC�-�+Ř�������̎� /R(q����7;�hi)=/Q�.h"֎��;v�۴�����>+�|�J�a"��M~��kK.',�]ҪeW��M�B�l�ka�#!�*L$7�ETy�"�w��*D7>�}#d�g�T��f}�������^��Iɍ���U+�S��6M���:��]�fO�Y#Q��j��M��v�K���=y��>�'��#2��xK�ʤ�no�!�6R+�Z�Jh4��c��y��I|�$�|G�P�:�GS.�Uj�>'��Q���7>i#��}�'�$̡��)v�m��n���C�� ���Yx�^�͔�]���.��s�m������9u. ��O�8f�F��Pk���}�
� �q�إ_{� vY �;R�<UY�Q�z��L!(Rr���7>��aJǭ"���
�v�!�0�
���:V���� �LRU��I�.���mS�R~�l�$�s0�?�FF�[t�&ȍ�܍��"� ��җ���M����_�=4h?����j�2.�iL�t+�P����Il/��:�ҡ� �g��cG�
��������T%lN�C�t
:�-hrGJ��t�w��1�A$u�"E<"�i��1$y��%7P{�.R���֠E[�̕�Eء�ݥ_#�sU�#/�+f� ^�|o����/2�H����Mg]�����g�&(��O��7�ͫH�au����
��`��tކڥ?&b�N�é�f�2��q\��n���[m�B�1YP�v�W���
��|Ҳ,��]�s�^`����Lʉu����p��4rL��|�v�Q%��~WC;�3ՙ��[���m�>��:*)�_S2$B>�87�t�8S��#9!�\
	��,(�!2vw�`#dV��!�l�������A9㮐w��g�t��.��]����@
���gsR5Ǘ5�yw�%�a�ҷJ>rW�@-[T%g�ܽ��=����S(�	�1q(�t$�T!���1ɷW�N\+R{�'�W��W}��uЦ$^��qd2בY�jQv�9�=��A>C���.��(���T6̧`4}���{p�Mw9�;jG�����4��LqɞQb�]���[Ah�~�;�`&�+I��,=LU���b�.S��������L�T�r���C�*���Egv���-ޝ��GI�ө&�r�]���2rk$�q]�Ș�e߿X�����*�<��Q���o
�Ҽ�t۪��[�2�4�������< 7�O?t�Tۆ
���*}ɯ�f)�aLJ��������Or��h}�ж�O�N��ղ�5M��_ڗр
Q�.}㨒"����*
�)f}ҿ�;�F��L�����}+�i��ź�׵ ��U!��R}�K=/6p�.�Z���RpR"����l�O@>Ƚ�.iS	��K�mәt��pg�Q��	U�|M���\w��TG��ʿ��Q�4���}���372����f�ץ=���J�#n��T!С��u2�U%v���("i�om	 �z�D�� �1�Kߴ)U�LT z'V���#jJ�x���n�ғ-g���@����W�X�9lȓa�;���z��*����Fh��#`��8N��o�d�`IjP5r�VF*&7�u�PvBH͢�l�Iל����~���MY�={�f�P D�h�Qi�wJZ]�^(�:L^��Qd���������Q�}4x��:��lрA����\dd!S�+�lѾ�7-E���(ԚL�lQ\����<�R�,��NWLoNS>�n�d& ��W��S����i�͗��H�ڥo�5���q�BǼq���h��m��RR�R/�i�t��1qs~_�P�Bus$da��C�V,��Ds�܉�*@5T�2��!����f+��~���@�L8�!l_̝n�w�(��7�	; ��o�ﳑ�-�7AS%�\���w;�o��輗�	c|��i+��@k!g��X?*i���>��|��2�;��_�ۖ�E�*�za�6b
�R%O��&���2'ѯ�n_/��t �}Cb�Nc-o1W���>�I�"�=��Fߘk��Z
��]P��I��0����M�*���=�����N�a����^�rw�SQ~�=�]!�px�;��0�9e�J�̥��:+dt���%>GO��'�'9 ��Kﺡo��J��BR]0��^�#�����w%�e�䃎\%'�!:v�΁Uzéf-���āކ~��c��+�y���r�ls�w^��C����q��	���������m�\�]��r����S�	��q�?;������{G��BjL��Lo�S���:�O>m���gz�b/T��$���+�3MO�)�f��`�ؘ�όZx��X��� H���g1��¾b];�g2R=F�{�`�.똑i�ƨ���ٳ��{eٵ�95f�:j:���X���u�:j��w���q�ơ���n˃���hcĞuԨ{t�(F���E�Q��O�"��\㭁���Qw5��O���g5Z�C����g5:,��M=��g5z��F�6f�:j�����+�1{�QcT�e�S��m[G�I��>��x5~z�:j̊=��"�]d̞u�8)��a���̕k5�mO�q+<���bo��u��s�mԀ�E�l�ñ	c�l��/�DK?�<z��K�l��/:d���)4	�mԀ�M7�"�#����P�c���@Z��6j@]V&"/�10V.��Pו�2�鍫�6j@]X�Q�Щ��ٳ�PW��e��
c�l�ԥe�"' 
s�����-��k��ٳ���\,(#n��q�-�<mj=���=���\��h-먡k�E��������:j��2�ʲǫ�[��QCז]/k̟�u�е�SFD|㈅ZG][�r���ďZG][n�[�`6N��u�еe����ט=먡kˁiW��u�е�!�S4��n�ZG][.�i�	�q��ZG][��(�62�5��oĞ�-�Sν83Ff5tm�������g5tmy���q�YG][<N3.1먡k˜�mI��J�QCזQ1����[�:j��2	Q�K`���u�е�w��q�YG��9SK�;�#?f5tm���������\SF}a>��F�k�3CYc��Q��2�b��¸Q��F�k�>o� c��m�ҵ�&�QJs۳�Hז4Cw��1{ \  �Q�k��&���1�qۨ�tm� ��2�5�m�@��܆c��¸��m�ҵe?N2��񞰍Hז�����ז�u�е�C1����u�е�f^�z*�sa5tm9꒹Df̞u�еe��0J�Ř=���ʯҵ�v��"�a5{��\�,��8$VQC��k�#�򦫍1WXE�޹o�ਗ਼�LMXEŞ�-�0���c�k5{��\��@Io�(�ZEŞ�-�E;��y	ȵ��=][��!��ٸ�ڵ��=][�gx��`�
�VQC��k��ZQ���~ϵ���L���v4�X\먡k˫1h�kˮu�h���q
����YG��P��O*��k5�8�Cv�[5�<���ko|j���|�2ʰ��]��ߒĽ4t�j��(t��Z�:Gx{��V�������C���X^����Q�a뻤n�M��L���
}UP�����7ù��]c?7*�� �� �K����gШe�h�RF�� �ޮ��
)��[�����A��
	Ɂ �]ϭѓ�wr}=�1���zZڳ�iiW������/��G���(�Ћ��i��{E��|f�`�P��c1�su�Y���ejb����إy;�V��x���i�r���^���{{��=By$z!��3}�.p �̕8@�%���e%�Z\4d���s �}]�����"�N�����bTT��ڼh�{�\�����䱺l�ү�~!��+ �Y_\��Ώ;��<sqɃ�7P
5�;;�'L�V׮����T�VקFb���-��f�!��C͕�����s��F��j�;*>�7#�<$Z�=�JF^����}s���z~�!��\��;�L��?Û����H�c���V:k}��4F�~%&_zl�GR5�m'-�<2���VeQ8���ӝ!9�Ť���D���X��1jV=�a�ѫܔG O-�IK��L�"|�'���jnX#�їUa�k\�I�(�	�v闻R.�3��VZ��B�z�����B�j�y!�p��!?��r��T R 7djW�w/��w����־o�� tP��d�|q�ۖ~�I)d5' b��� A�G�סּ��~��Uc9����~%R��f�#���ECR������U��Ծ�G7��m!T�]���ݍ[�V�nJΩdړ�Gx����rWȧ���&���ү�o2�VT�,��|J���Ѵ�k�˿Э�?���Qe��:i�
�e��W?Q�h��Q�t�jxm��=I�Z�u�gV?Q��@7���o�����7PԲ}U6���T�s���E��5 jx:�ĝ�d��
��I�r]^N��q�vr$H���A���8?�����P�      �   �  x���Y��H���N���|_8Ĝ�_�Y�!�al�>rr� �ڂ6�7����K´uj�
�pi�D�7g���o��^ ��`"��vxe�NK7�,K�t����� ��O�?)�@"�,f2bX���_��	��$I{�#�~\����z��iG^,���z"�Ѻ�7M|"��uLpLq�4�юv�98��G�4�����8���.8Ѷ9���������[lu�d2�ca=F4/���!�b�� ��9��؎� c�#r�Un�g!�[������թ�K�&�:������C���0��Q���[�[��Ė��������&1 1�e�mC{�ȬͶ�[�[��N���i�gi~���bh�#�o����28J뱮�bT�%4��!��qm���gMR�M} SSQr���ht��P�o�(+�i|��כ���
�G\�zr�v�/��y����Q�P��S�Z�0��R���}���<�֓��W� ){��zhh#�]���0�^���R������c�b�"��E[�n�,<Yo��^V���#���� ��s��f1��i���P����i���N-������iC�Ӎ���(�)�.�&�mβ�I�����ʝ�۶k��/��PDx6��MH�%T�YB�Փ6�	8��WvQkgL}<Ė-h�~p2mʬ�F��'!���Ŷ#�'@ӫ����Wz�F�א~�dꔬŤ��7M~b�8�E�TV7�ك���d�Mr�睑����(�@k4"��&O@�HE��M��Z�V[�U�b{�ɭ�(�).B��cIg���43)D����XC�pl=Y�k����n�4z��F����1��[*>�j �!��
P����������cFK��p�ô�G�e�V 5�kN���Fl��������t"!.�@ԯ�A��ݪmX;����,K��Ib�j~��Zl  �K>٥-����$lҘ�����^�HH���a��S�N��V0ӄ	/R�#�3�'m{�*ht4�g�୼h_-	r#4����l_C�bɱԽ|���*n�����$�"Q��7=@c�"-����I�ψ@�r�tY�$mh���O�9e|�7��GXT,������C&�n�\�'��Z���h�&	�đF��ݞ��.� 7��&9ҹ3�=Q��)��}�:�2@bv
�v��N�!������L��~�m}����T��9���4�-�"%�4��m�)�d��.����P��rU�s�0m�&�%]��� �[���x���1/��(Z��c�XLk^,��S��N���0��2�%�����G��D'����9�̲<��A�`���Ki�Y�N\0r��±7���r��LFaߔŀ�<m�(�LӺË@��)�*���ח����	Z�匏�c|�(:G	 Y�ōV.��=�Yp��0��d�c�̮����E9[�;��l"h��5@�i�Ж��I�Wҕ�-�>�ꃓod����?��pM��.��q�(�BR�bN[]%�9��m�e�C�Ӫ}�r��>7 �oi}��l���Gxd7���&��߿�w���r�/�u���6�+8�Uo�ݦ����%@��]���k��r��c�glu�����c�	����������~�>�;P���M�}Y�#�.�38�m*�l�����ʁ&C&1u�b�+����P&      �      x��}�r�Ʊ���W���o��kAU�&Z�Ւ)�Z�l�����G�g����|�dN��-�h3�nO��f�Ȭ���=nVąHeN����U�w�l�f��x}�bX���S�u�c��+J���'�57�zT�(��o	3��%fXn�z<��v?}�v��w��78b��e��m��T�ۀ1��1F�O��26a���N��X���2E�I1�~��Q�h�O�9>6���xFn�x���ĞX�ĸ�����;�2*xcְ�$�a\Vb�$�B���L-MzBw����_^�����}�Mht�L���c�Qb�v��?������G7~c�]��o����p�}S~��eag�KE���9|��&v�"D?vv�ٍ����'<���l���>�>��y��bJO��3L��>���#+��<<����̽zӑ��t�60I � 1֡Y�^boĨ�ڙk1ԩR`K�$�R�]��|7(USs8��X��S�*�#��`��Լ�`P�;��F�e#,O��l��I�>�G�仪�s���_��S�����y���M����� ]qw�=��vdI��&�OJ����Chb�Lb���4��àjO�5�׌�0w'X��������#ML��h�ڤ�:ɘ�Q���!�S�t����qXܻ.�a�|��y����۴��6������@�k7����K� V!�a�kJ��]dgY���#{�cP�Z�.6��0oV� �����b���ە���㗬rK�XLғ<�����5U��2��c��E���w������PI���T�";�_���`�ӲU9#O���v�c9>���X�=��_#�3�o@�}e��9;�Gر])���3g�.��]EN�$o���5�`A�)���ciKK.�ڟ��`�u�-HH)�����<.�n��ҌJ�|@)͍&oln��ߔ�	�&�Zȃe�2��IY����q{�)����6=%a�bgmЌe$�q�̖��6�M����D	�VX���6�f�yV�V^��ߝ`Q�	�p2�'&��+������������\7k�<$�a	'���]q:���������k����Nm����˧WE��=;pB�.���6eY��(^��s�x΃����7qr����ӧܷ�d�;�-�{�.^)�#p'��H~������������M�ˎ��j�_� �(rߋ�[�/�^/���@����D�+$���<q�f*�7�d�C�Dtˣߜ���������-�.�������χV�N�/�%$x���Tp)��^�I"��r��9����C?��0(xI�ƽL�a�Gfl�/�uMcw��A�)1�xoZDAb�:��d\�1��Fg���x�+�p�:@���p�BK�ʄ;X��=A��uP��v�/���2I�I�9螆5�w����Mxbⓠ!nߍw�5'z�=�R���bK�n��=K��FiDNU9o��8��-$�_{�}�E_��2�?H�����Ij�QT��<P\�%�v'X� od�FE;V���$E�����i��?	�}��nw.1�G$�������kEYv�"I�L�'U����=T�uM��4��+.@�Vkʲ��5��F�a��c	�����fI��y���/*��������<��1ܦ<l��h���=��m���l�:��6���!��q	���h�g�&��7JC�Vi|
�辩1.XT?ɱ�N">^?:{�,2��*u0�:�cY�DU�b�ӹ)(}C~��H� 쓙��q��@�]zߠ[��E" ?�P]4��і[�#P�Յ����bl�al�~܈� ���-(�PV�2d��imDi2�3�c� �@��Ѭ@����R;��ŉ$o��yI��J)y��F��#��Ğ�q���N�p�㨈8��� o��7��ڑ���^�����L�h�G�{M~;d�#�,Ac�S�w@2�h��'�mN-�#��ɵF�0��5O��L��*t4�:Y����X�[�û���`�Uվ��(�w��D{��� ����-G!�A(8��g��#��P[n�T���[�8&�.�{��-�ve���q��z�n��^u"%�6��Iբ��O���'Zw��W

�g^2(��35�#4k,�t������� ����	��}�\NY�Z��`Y:���<�[�k&�-�l?e��:=f
/�zTB�o�Y�U͜�
&D���y:�O�
�`rB�Vr���ė�V0n������ۄP<����6��5�3�] �^�2�H��9T7���U
D���
<�о�,���o�7����N�n����ݛܻ��=��Vf֡�����!3xʶ����w��֘���Ƀ�Ӑ&v%�Ś�A�D^����,�Xd$�F�����D����t��Ӹ-���.���J҂�{Љ�ȳ|5�tKD�8%����)�ڌ�Z����Zk6�I��}���W��?0����v��	ˮ������ex�6���7��=;T��	�y��kn�i����N�4�"�s԰&s	�ǖ=q��b�_�,��b�tV~� W�cZ�-8nF�S��L厰Wz �9�/1m$ܱ��M��������6��\8�	�&��*]T��0��	���N+#�ݿaI�����K��E% c�����v��1��Ewh�\`�[;��r��g��iל���p��p���[ J��y^_��W���C��kz��&7�}{�˺
�8;�U��4	L�7�q�Fl��Ѓ"�u�תhS:��(����0�dP�0��r��(�.��/D�W}��7��"o�M��1�QPC�Ѳ�s|Ҕ�}NyM̓d��+�S����ps`�����
����D��7�Yǆ�V�I�odHX�!k����ʰ:������rgѵi@�s�L��Se8un�)-cS$9�Q�A�14,���º�k[$9�K�XL���E�mD)��7D�Ӽ�a��8v@��߈Q�׵��d	�s��Hf���N��2�t�u sU��2���)e;t�����Y.�ښ����JF�|RW������:k)���J׷{;y�[�qU��N�?��Τ������q�����$%��I!��t�,j��]g��X���=;}��	k�z�0 �D]��'�d1X-����im�n���?
�gs>}.a/C~�V�x.�6��B{�����2X2�������͍_L��d��_���=@<�'w1��Ě?�p��C��B�DT(]��
�dq,�E�th� �߷�~�T9�z)�qo����6��8�	<�|Rƶ'eߣ��`�`��ܓ=V1�f�b��</D|O� 贆���7��/�b)�]�l@��۸,VY�ۊ��T�q-�W���~��/#O���಻� L ���D�$���DZP�K��mmN~͛�/�r!��?JA]�K�t��\u��l����t��v�M�_ha0!�lO��E���;��tiFB��	6�^T�-g�L���w�Ďpel�i��i�&UXI���P��և�ҽ���a���
�"��hn���0�#߱�w�߫6+��3m;�^}O�%Ӏ��t���eL� ����M��MD����
"��5c��c� qn�����1_�Qq��A�% �B���!A�9�
�;���Ot�V�V;W������X.a����5y���t�4��'� �jTv��$Èei���-����<^�D��"������W��E�p,�~,������W4r�A��[��z҆�p.o���dX�Ѐe��D+C6Rwaڂ�?���m��h���L�$ў���c՚[�`��BX2�M4�F�*g��w�,�.���H��D�mTd���ұ�W� ��;v��|�O��?�|]%�Z�QX&�'��DX�:��ɥ)��ݰk�;S�K��=�m�D�ZoJ�X!߂�ts���� ��"�._iJa��aX���/B���1�c�1�-��}SU�*5_�p�Q�R�|��A��H��"�դ���Ch    ��Ӽ�q�&�v�2|�r�o	�Ú���صǤ�Sy����L���t0YJ� ��� ��H����滭��pTol������x�g�>��l{�T�<�z�y퓤ˇ
35&�Y��'34ְ,�u-
kh��ohX�k���P�w�q���^[C���)"��)��վZ�hD�<_�.�8[�lw��u�}Q�y�'�v��)Z<��#Ŧ�������
���}�)O%.6�.�ZX��`q0u"��gOL-o�U�<�ŏ5(�-��y��::�0m�z�۔6NMl$�����Mc}�� �k��U"�ʪp��ϒEf�x��$�R�j�x+���@�@���Wv�����\��5�1�#�nc?O�ݏ?�����s�,$@κح�me?�������fs���K�rP�`�4�Ե� �8�1�}��*|�2����{;��0ß������Y���)�����o*�K�`�d����[r�%�n��:
ub4yT�j$�02}t��/D9`�U��ұ�"�4�P���-�[z��5>��s#�י!J~�x�cL�q1G�sꆕ7o�U&W���Jݘ��eZug��&��`H��������"ċ/k/�[oT�q�7�
|-���ڵ����zA!7i��G��R�:|V[���UEi��wŴ�_��6#H��u��k��1Q�v�t`eݚ[W�3�?�B<��}(��l��
�9��lI�d�[�t6Q�\ۊ�Q����%������"�����Z;��j!p��$[��Bw��D��j�����TR,��da!�<{Bg �y�g���l`AyZ�O5�R����Lk�&{r��]�tz%\��He�ϗVp��2�X��i���Uq���#/�Q��~�m�~��/Y�;sͪ*?1�i��1�y=�ǳ��Ap�%��\��VU�V,M.�g?hfgN���0jXu��^(���KW�O��q`ay�q�C��Z�APr���0Y��`֞�'wlu).0���G��A�V��t�w�hcu�%N���(�B�D�R������1.���c�7`L��+�i)e��cZ��s�c�˔=1+�O��rκ�7���-�gK%�pܞ.��Q�t�_�z��Ks�z���@k�v�����7�5�{�-��1��㼐aUV��q�=`������6=X�Xث��#��I��6q);p�o[@�Xw��x1tD���T�'&!J��۱�e$=b�-M�,�S��.)�r�E	(Y�c�!��FU5#�0D���RIwl��"��V��<H�JYMX6�&t���q�pz#�T���Ŭ)��+G�-��dh��|Pؚ�3l�,R���4?(��	�����!�q��ҙ84l�ћ���T����p�P,��.�R����*A�sg��-¼�g�q��F��-�6Q��w�s>3��p �L����a�(t73R�>�$K.6��Ɉ�&#Z^���d��bMaV��'VV��!&V>��N��C��*S)��U�����L�����6H5�%S��ߋ����o~�� [��`���3��t�\U�e���
���e�9ªs�ejR�����wl CY� 8��9Jc
����[�@ZD#,�Z�c�BN���`x�(�s�O���P��mO?�k�5e~┙���������7Y\����^�]���`wMݗ��I�wq���_v��{{x��o��Guv�$��Iاv���FP��:����_�ˢ�'��/�\����o/8"�IDa���@�n�~Z�I8]�_�BO�Fmu�.~���55�xQ��u�(�JC�U����"y�8塻T�.m2���ޕ�*f���f�[
1��J�.��V��DXɳ��o+�߲�w{T�v�^����^x�(�PSHH�Sj�1���\-ǩS(3k�'e_Uy��ۚ�D���kb�ݙR��ɱ��E�~����?��w�ׯ~�_�o�W����~�J�J����g_[��������̿L�_��]�e��Y�ן?-�g"q�����կ��<�0�{�|[���*�Ed����h�Eп���,��wo~r���_�7����!��/��*)�o���7����!��!i��f���W�����j��q��?}�:N����on��_i���I9�6�T�U��0�'�sjIj�[����z]Z
OΛNk|Bk��ĹGf�Y8����|�ǫj�"9�;���+���l���Z�w��EJ8��<P%�R�.=)=U�{^�� ��rD�D��Y�b98�N]3]$g�K�cSomɏ��|iZUm`���.�\���K���8���53�\�v�ߣ���1πay�e*KS�w5+��0���9�(�̊쮸���iЄ�[�]J4J_߃ˢzl'E0��E�Y�h��z�
s��8-u�C
o���#+cd���J��x��9��C����6n���vX�gS\�l�a�*��u��"�8�ԮT�nn35�������,�n�������E ,��f�O:L�؇n��7�S�oO������,��QZa[��E�P=ߍ�)`55����$-�&���:��d�: ��n��Q(��n ,���%��pu��1z��Fr��t��A`��R�!�)��\T��g����vX��7T7�ڿ����^��ìZ�*g���Q��&*�5��u���'��܊� G�E�lw����?�4��[oy�Ov�>Q��7�m,�e�7ܟ>k�RBY�<)xu�����eMf�XJ_^���kF�R@�����<V���G�7��L�f=\渆;ߐ0�M��?]V~2ś��,ߍ�y��gv˨�r)B�������-X��������xH�d�\F��h2�~�F6��&] �O��pm-�i���SkF(џSlg�-^���ɻi�kˡb<.zЦ�6��y1���ĩ���.�	�t���`V�����V�~�^UQٕW��Cw�����˛O_��z=0�8h��R�s��`��N"Pi=���nQZ���60�jv2=�pZ�>˃��rx�^�O�aO4��1A�k�;g���UԬTs� ����� V����^G�l�P§��/�k~���:I�̮9�30��� �j�
^�&�]Tt��� JG��$��}?>c�YYtetN�����Q�헚NՔ��Ta�\`��	�E�&𘪮����w�*_��ǔ����=�v4�4�u�"(��� �({�f�����E��x	N���}g�Z8�����Ig��m��H�`��ƗY���]s$g�3��S�[���m���\f�d��5�#�<�Ֆ,X��)�KH��償�J�0����/���}xʰ0�-L���(=��$�S�"|/|x�,%���r"Z��f�U�)"��KJ
`�G���ϼ��,TͻOC�<�1N.��O4��;����<�a�me�$�Qٹ��X�m
W�v�5�X>�Ht^�4аd	��ސWZU!����T��yy�x�9�W7}cG{���_����v�?x�?Ņ�Hi�?E�w�:E���"(�ڡ��r��.�1*���i����ݳ%�y��<�0,��&�!�5���$_�_�/G�}�n>��v�82���	ß^қ9o�{	�����M������M��}������_�}��(�	���������Ή��ߴ���g�}by.:m��-35��NSq0s��������q�x�Ys?D�aU�mZ��c��p������>ږ`.)�Y)�P����/Z
�� �);�'��h��پ�Ȍ�Ǵ�=t���
<�8�S0�~�٪�4m���K��x?����`����Z��[�����ݲO����U�Mm}�*�굜�0q�=�ܼ�Z[aX��0�֯���䙋7r!��S��D,*w'X5���VUY�Os�-"�8�����s?A��($Z�K��lWm$8(H����^H�넘WHo�m���*l���K��k���볫U�G�ۄU�imƚ��)����TT��XF��6�z3��i ��6��0{�	��5pn�}z���*
\�G��zr[Y�>����g�b8����m�Q�w�֔ �  ����t�Yz�cR�S��+{�'�|j�� ���&���[a�+��1M���]��r���a#PLZ�'uЙ���)���a�Y�8�[d0�-��<3�`=�̐Q��:5�H�qS�WS<̨�sL�Gd$�Yw�ʳ�-+4�~�ʘ6 ��1&�y��f���®N���;��5������T���l�M`��z�*�VdmYNwK�kԚ!Ulv��7^���M�W�h�!���"6���h�t�`���xs����dSSX����ʕ/�5����aqP�&~��������� ~�m�A'`����P*�L�4�. 6/jç�r�_�P�7�1��-��@�Xq�V.g��Z�HW��nVZ��Ǫ>��=jl����a��s`Fc����fhY%/��o����w�%���      �      x��[I��8�>g��D�K�U$f�j��h�au�.��Ю����"R�
�ٶ�t��D~�N:(�$�>B�0��GQ�<����?~g��~������=�\�|i���W�^ӼVY��_~o��Px��Ͽ����(咏�G�Uӻ�ٜ��7�;s���o��0�9�0��o��F�+�o��Q�h.�rF_�z� �����E�_��?�~���6���N�NN�
�\�z���.���	!�9Tr"}>�c^)`�F�HAu}V%�MT���^u�A]y�9�B��PEK�t�0jy��<E-�P-!	����W�ߤ�<W?�|�0r��A^ypA��W�.�-Bl�҉��v�Ǆ�5�>��.�)�,Hۉ�e�P��"gqmb���/�J���y��6�U��J�6+��ʛ�qF�3��ވ�&�è~�X��N_�%m�Lrr�r�@�(�J�l�	���S~�S�Q�4}�J�c�RѼ��mf�3s�F���k��Q�>�<��c�o�7ES7�$�*�Pxݧ�ƙ��5+f�f�d�n��2��eHJ�1�c�����di�P[=��f��V�Xq6���I�}�0N��k�Hb��>Cy��2�P?�VF�4�����Z寥W��o�l��LAP�q�(�o�$�Eo8�7�d�2���2/�*Du�G��<Z�&cAH��<l�&��;˄�qQ�fe���O����t3����nl�[����������a���|
a>��y2���m��hՎT�&��o��Ir��i^��:dX����ɽi���#��1,ۅ��BGʸ��XY�
/��8T�0a��Ɵ�kY�wc?�aT�����APj�%�Y������nd~��*+�"h��u8�ңaG�fVvA�M�P��~�������y�_��|��l̑�;�^4J�^���SbwT�7���\2�\Ԇ�gR�>J�dG�J��7��n1sqm����|�X��7)�φ����<#��"��n&�M���7}�����y��T�p��8�*GE�ٿm'���qYL�}9ب��$o<�h�"Ё�u\��m}�h�~�c���5��2oA����{��;�m�{�c�Z���@M<�s�j(�Jf��|����˕x:�Z�v��{ըu���[�uSU�Y7���M�7Y�ޠ�/_R��/��즳�+���Q��m]%_����~�p�n�:Ta�Y�6�������_�A~�>��}�|�}#��~{~�5����ۯ���Z���_��^��^��A����64�a`YW5ȃ�ׯ������p���~MA��"O��yr��	����}6wͣ\a����������,Yi�1
?P��U�AL
q�}4��Ӕ������g����kuY�l~�i� ̵C�~�c	�()�uW�)t�I�HD�^s�X��qLM��*���k���#�X���(��4��̢���ߐ����@��.�Q�i� �\��w� d�Pp�{��y���?�����]����C�G�Ys�wW�Ju��m��ʭt��������d�qi��h��``�
�l�l1ի��^��=�7���yj�\�˭�T�9�c
/ ��Ǔ��@��L
v-6���m4mTfC��vӗ�"﷌�����(yP�C"�+g�Ic�KX��2�h�Q�=�"("&�0�igo���`A�9b�P����.s̶�rٓv:����-�%�gL�	�:���> ��e~�3�θ1!I�/(X�ϧD�e4�:xU��GE�}i�fm�،��� v20�W��˥�t�yA5�l�R҂��<�Tu����Ћ׍�r/K���b(R�y�]�=��J3��)6m�q��/V��(}ET ���F���/�0p����t�)�K��}������g����r_�Գ���ɵ���T����ﳓ�ꐭ$��������A���a�iX.�\=�ͻb�S�i(>��ܚz�����������3��K��@Y9��r�w�7���� c�0A��<�n>�*l{�Q��@!n�Q�\K�w��*�����FmJH��h
�q�z�FSA�&�a���BW�'�[oԘ5�҆��Υ����$�3�A�88u��׼��]��]��
�v$1��x���E�5�lۗ����B+q�lHP���Ι]�M�Z[K��D},�m��)�R����]��	���*<UPR?�5��<iS7Lb*�%���9�7ڏ�EÛFLV:.����m�
�mߖQ5TI2윯�,�=��Tc�{����I&��N�ب<_�L���Y��z�YRI]���M0���N^����`���}�)�ˎ�l_��s}�f�=�Z�����hu�˩6+[|�?��<_���\,��`�O8�X�`��\��.+~�CF<t��O�m+�)D��mCN�T���R��t���"A��I�������WO��4�u��Q��'h�։bt���t�SU���p8��Z�Wo=�#�y��7�!Ӌ[�$��z��ۋw�D��Z���BC_�|��1�2w�8Fȥ�B��a� G�&��:0)D]�
�=,KQ�"l�U��F�\�_ұ�M��*���C�.���\�+��*f���+������,���Q�d���ݞa�;.�I��AP���F���?�Ĝn�G7t]�!��Kv��<z���������қ��a�n�!}0G�R
>�Һ�D5�W���k�8�z�O��=�
���6Z4�q��Y�}:�D��+}�#@�������\b��a"�QWYd����*�͈h
U{��G=�>�.�tmH�C�E��I����A�k��a��m�t;u��D�=l��M��#�'r�#&J����Ad�� �pp�.�Ȏ� ~�4�[�g��F"m����� ����}�~�W~�SoJM�A� :�N�/)s�.�-�՜K??����h�q̇y�$���IHy�ҮiLL<ϻF��5Mw6߽���vQ�D�o�'SE���كU��A��&ܞ�����]=߽��>\��A�.Φ�_��,����حpL�ta�7�u�zl0PH��u��<�h�R c�����a�n۶ v𧻓�2��bG~�c��������+.�D�תT���	��R,7�(�Ǭv�:�U��*�R�қ)1��@��E�g�\!���^[e��N��S;��i�95)��K1��͗��-r:�ڗ"w�=�]nRyQu(�vǩ�4Vǂ"?�P���$=���$��H�2r���������Rn�
vep���p���}��.k_:NLjf���C2	d	�,�,YmS<�v�Oʢ�a��{K�6�^��E�L���2\���S�brH��q�����7C0,����h�0��F�c�� �Jw4b怋R�u�L�)���zMZ���d_�lBC��mxE�"]�q�������Ym���p6�s1&ewOS�K:A�WW�%J�]@�h�+b
}~ֶ�����vp�4�g�h���͜M�m��Q�Oۦ���wl�@	=m�gT6ڔ��e��>EA�.�/3���j?��?\8�U�C��-�_����\*8'-�<�A�)�d��F�i���/~�1Gw9Mq�ޕ�.�r��1�#�Q�<��3�k_�E��}��y��½�d>ͨ$�ۓ��|ި�pJ�-$ݔ��lW�xu֘��z�.N����$H��g����g� ��I{d��*�>O���d$�)��7ɀ?����r���N9� ���w13�\���Au\mP��͎>!�\�J[)sn����1�|"y���q�c�F����w���O�l�l�AH��6�:/�ب��$���9�文$���~��]{]U_��{?��2XXR<l���x����5WL>N8�2|�C�<ǲ�_H�g��D��;�=��O�ͮ��r���6q$a���E	{SnۆP���6�M��y�΋<}��;�4����i�JU2|`�),�\w�7_/���Q�Z�F7�}K�A���Y��V���aa���N�������Y+�B�qGF=���u��?����6g�F�-ƫ��.
L5^iR�&�8�H֦���V �   �nN497v��z��2����~�U1�R��O-٣��	eo�?�۹�rVE���$��쁂U>&ة�S�9W�1M�M�67�3�߅�v2�?���r��f��.'sK�3���N��Y�%|�d��k�`���N���`�	�&��o�l��yߨp\#��!$�{T��.�=s\���Us�`�l�"-���\�����.Y������/��?G;O�      �      x��}W��0��s�)���XW؈�=���{�y�E��J%� ꯉ����	 �_��z��4��u	2/�}�ǿJ8Bh	qs�Z����� B�9���_$����¨��?�~��|�\�H�U� ��%ɯ�[�C��������2B�t�*�(s6zv6��������w2�X�&� �pȦ"r�sdZ�Z�u�ޚ����/�P�<��& L�nh�r���#*��
>DMA8N��"��b���FuIha:e�������v��ݺ�?{>)[-�@(�^(Zlv2♌���"��=� �N څ�9�>Ԍ�B肩<�q��m;̑�k�Y����*QZ9��djY�W���`��/�������{��4́�����Я��%2�)\���>����i������-a ��q�~�!�����:FF�ӭv���0��=�����������d�*�=�1��/�I��.��Ӌ���G:�M�2�C������Od8��䂅��f����L�@�;3�դ��$���6��k��U��9�~m�x,�7�,��Y8kaBN�mp��>���E�s�yC&���� \{ᠦ_�d�K2?<�u�ɤ��1��ѭ;*{F�_]8�?=�T3�(�C�VV�'���JΣnc���]�IGgϵ+F%_D^ǧ�����D�ᆌ$Cm���8����s�Jfq3�͘1XM,�E��C�PЌ|v gPM@M��l��U�D���[�1�dB�%-���?��.�/�e���d&��<����H�G2\hͰ�j&��ǚ��.�3�M^o�!c$B�l�W0�)�/=L��b�B���e����7����lD����,#�l��ݶ�ƦQ, #�0���I���?��:'t.���iii�ԁj�5@>^�dT�ia��Ц��}I��f�P����m�U��A-�H�V�n��[V-n��l��0�����X�	�؅;��f����w�X&IQ޿�%B�l6�/
=����0`��ʿ��O&9��ߨ���,�>g���S<���� �y!��9��c�V~D����� �7#�+=s�FjJr�lv2♌���8��d*�j��%�ld%���4Y�s����?����� ��U�D���o���d|#l<�!���`�p��������j��jP�����|&����y��a��i�����[�i7��=E�O):�0m�:S!�f�L��{���u6���1;��̃m~��lݠ�>���TX�U �(өߙ���9�x��dE��j��N�
Fϥ$2z��y���6y?���D�5��"u3�f��DbN�{������
B���9C|'�)<�2n�:�o����A�dU�\8�%���V�dh�ׅFџ]��M�I��i��9�cp�1�����l����`��.��T=��5@@A����f���a/�<X���z0�?��1�!nE}��Ϩ�4����p�V!� ���g|��gAjk��6��~��G/�<�.�_��늩Ui��@8�,��n��?�J΃�NcB�_\�u�������u�������ąv��D$��[h'#�d(��[��2
͵&S�0�&m��C2<�"g�ҽU���Z5�;��"3 ���|�ԟ�:p�v���.�gNu%�c:rq�����A������76a0n#B��'9��]jg�<=(s/����j`�lˈ�Ɗz�ߨ��w��C��fV�N�n��H��Q����9Y��F����$���n�}"��~�٬�&��FՉb�W���	T�9H�܍�UO�;����`l�p�T[��:�l�ylU���Q�H5 �@�ɘ�H�?W��� N%*�#��fX/P�Ƽi����ի/�e��l�M�xd!�������#�#�98�#Ss(D#F�e��v2�%������b@3B�/����숪K&~�s�f�3gS�+�cF��JN�6��Ö*�i�C���+F_D]�m�7c�I#m����4v�v��F�UpP��b�E`򟏽�]ݿ^��=�ۤyڹՕ^W&{5P�F�+�����a4J�]8���Ў���$�4�쨇�������MGm���U2"��&�7g/�&�	�`l��'�	��	霱U�f߫T������.���r�\��egg����/�/��X��[2!�b��rv��fv2�%�[��
b�,�с&:�oGeGTXo���5���"��>�����4h��^�K���SS�ڿ�?�:__y���LخzR��x�.[�zn�d�0!m6�t��m�4c��vl�VT�iF�!:��������������1L}
�P��[ZD�
E�Ҍw:v�>V<Q�3����cLa�� o8���f�a���\w��M��jGU/���V廒f��r�֭���]�'S�&3���}O?�z�|C&aH�_��dem?���#�tX�~����*?�n�?��N���$�gx1�u��Fϛ��_m997r��Z�Y�]xIJ����Φ)����@$ɲq9�v6䙍��+IΨ�J�M,��<ʋ�ʪܞ�>��5����9��wu�x.td�U#�R�����Vu��B/\^��t�X�`O�C�,�������SJ�8�I��C33.$q��k����7��X��fԠ�g4sk�3�դT}'�8��� !	�`��G:�IKА�ݔ�"1,�CҎѩ"�US�	�`=�Y���LQ�̼e�<n'C_�y,��Q7'cZh�'T"���UA��ά���2c��o*u5j�jo4 �\��q��i%�-�9�of*�pU�!Jf�\�֪��מE�_���0m4S�+�Xy�@��C1|�J��6�?sV�P��~�3GSi_X8��	l u���̐n�7s��J*�M*6*Z�al7b'E���� �>Xc��F��M�ynG=��Q�T��d�&��[η���~%F	�'G�}EBEz6��]-�����#��(��j�;Bϔ�س*�z��L��q���x�ˣ`��H��S:�5;�K�3���:H@�U-*��ͪ�|��33ž*ù�Ɍf�*T(+>$ÿ�Ptfg���6�aL�K�\��[$J̪HF��#� W7N��i2=����LA]����6��u����u��a>��j�&%��n����A2�5��{�*M$�z�P�~��w���x�{t[�_�bKG-�V�L�G�3�&�I8�[��0���#X��L��뙅�{��:)����]5��b؃"˭.�&��O��:#�����oV�h2�	8&d�i�r�Se'#��
�9������t�JIٵu�-��G�NTk�V��E
Zm�x��|�G�*�͞��/f���7�s�D}QyQ��e�_KL�dpd�Ln]��N�U�ÖI���=ݨd��5�&��~�SZ_=ԫ��!쇿]�UpU�<A�ggPW���ޮ"�RE���lGu�}��$3gM1���lG'�R[�S9��z]=2=� ��[��	�l�1�ƺg�־���8H�x���������J΢(��L�_g�?�kS�꟨���k�I
�5H�0�{<�9���I
���Z���C�}���m�Ӌdg<�ެ�R�`����E��e�����z�hׁ|��ߦ��No}�T��XM���lm��̿�)�&��f&ta 0Y}{(t�fV�sd��#
<�!63-�ړ��v2���N��>-j���y"om��%����ڈ�*� ��r�Xv��Y��Z(��7}�LN��?��6�~�̛iM��ޔ���3�2߮�����̏��m�IǑjW��Y��+ri���I��IL	+�=Bh��ą�Z=�gL�w����%��Z�C��:ŗ�&3򚱴w}�!�:�j^K�+��qʜ�!��=��	B����PM���Q�RVԇmJϨ�,���uB�haN�hP�c�V��J�!(.>�@(�ԭ�b��������l��t�M�dd�[ơ�?7��8�Y�~5��D�� �.Lũu�{��I9{�F#���<b�1�|��]g���s��ँ:�~`O�:P���U��eY'�9sfg;��X��̙4�sM��H�    ���u�)���/ɜ����2@��H2(���A_��7�ŏtpa��8�9�Q����%,�a~���B���G���QX�iC����|��(��p�EA�gj
�gG�3ty�u�]2}��@�Yb�7V���&9�)���ou�	��ݺ���*�j�
��/2���8r��4��5�z�C�ʰ�$���Ԡ��́D?�D����=�7��p�M�x��g����8Q�lo�;�
~g��LR�i��YeU��dt�É<K�u7yM���L�Ӥ�s`��M詛�些�򤽟�溭��Y)�I�Tt��?��?�B�N]���t��J���9�0G$��(��Ք���x#���	F0N����{ޠ%	��H<TÔ��|[k�,m+yf�}�-�.4�IeQ�ٔ�<k��4ZD�u��{b�G����m�0:�Td�Coe����2�G}9:<�1}���!�җ��ͅTvDe�"�㷞D5F�/�@��ZQ�*9�:z�~]���_°k�V~4ڈ���_m�A5��N9����1��~����G�le4�W�"�c������>܁�%�6	Z�A��a(��0��ʧ���8���s?CӮ��oM�$MiVJ���q������ά>XUpW�Y
i&��S�fȗ���͌����0�8�N�N��P�@�D��fBV���	#�3�S�{K��Zb:���n�s�ہ�WXB�[�3U��fM�R.k�&盍Y�'���r�;��[��g6��O���On�&�C�K�����̣q��*/��t_��'�g�w3i$�a�	$=e#���-"r=���؜�{�4�U���;�x!��lWO�dm��v6�Ȇ�9s��{2��zԓ��]�7d�K2bE�������kX���|>����'9g>u贮��[2��	�Gks
���X������me��#[
�De�Lv2�Xz������`D8�bQX,�ޔ7d�Y��'���%3A�G�nJU�4zS�>t���c��R�?C��D�'���~�nrZ�2�V��9�A�]���U	�3��@���~��ϓ�Y'���q�[�(�B�6��/ �s>����M�	����|������jh�{À#��B�9Y�n欬���� i�F~��+�����́��Vshu��i����6�B.��6��a��~Nd�J���O�eUʪ}�ja�-�D;����Rę\.�Qh�R��iQ�1�#�Q7��S��0
Wb�V��*���3�qߑ�� ݏ4㤔��Z�dđ�UG�/�Y%��2,�±���d��Gg6��!S����_F�ڱ���CK�y�f�H��q���X977]���$���k�nS��6�l�PR�Uw65�{�6�_VU�p;��ƁmQ
�vL�0ϒr��Eq<⭫0>GF[��W�y$]R�l����j��S�kwS9M�[m�HA��7��
\�.�3�H6־�q�D{�\ل��r�V��fh6x��8��i9�`��"�0���MR��T���,�ņ�}M㌑ߛ��MO����&���&ʹ��yCנk{���n���CY�z��zY~���zXG��~G�U7�Yw�b��I�5hs�-BV�,����V�>����?"�}#5:u��hϼ�Z{�%U@�\�+.��{P��)�Hƚ�VЧ�����U�V��ǽ-0�����p�I{-����
�p;���z��Y؆��ٹT����;$Um����j��v�cH����~g�l�jQ�h��
�t�)&o}I�1�x��G���M�?��靖�FmVX`�#rQ\�B.��ۿ�?�b�*����s���m��A@{�)^
;�̅@j���=�NANV)�G儮��P1Ô��;��Ƈ�iJeq��U�D��<���uF� q?�8|���W��g�uoO�*7�x	y$Ð�.~���%J��������=KI����%k����Ceng��B�S�έY��c�l�V�7�DqX��T���G6L^ו�7�yCf�`������uf'C_�y4�vT/^�}�F�M�ͪ���gT\��s��u/�����t�"/Mg�Xk{O>T�s��%;�Y�L�0�]�j�(��2��?�1/Ep~�(�{2e��3CW<�Yv��}I�!�y�Wݗ&�
'�桭�������gΉ�!�J	�5��*��Yf'#�ɘ�)�sf��23Yݓ�ξ�����d��թ5�=6��� �.���r,���z�'.�\v%�f\E�{����p�؉��D>��k���$��|�&C_�y�V�8�WX�4�#G-[��yB��!��؉g�ޤ	G������_�)�fd$�~A]7$�Q���S�0B�E�sf���������l����"n=m<o�[w����l8T��P�[2N�_��Ҏ���N��$�8:l�#r���zf���\"�K��N3-	{G�z��!�b�f���Q����hhz�76<��D��iN܇˟��#�I��8��G6ڈ1�(���YxA�;�nk:��٘3_������<i���[���f��s�*�`|�����Z��9>���c�ڛC�6߃v238$����t��K�5��zw*��΅���xYA	�{Ŷ>�k����>^�i�=�U�eDq�����>�ڛA�JͲY:'M@W;(z"�s	���3/��"���s�7��qNeC�&���*��u�ju��2�a?����͇q��^�bgp��bx��dQ
u^���_�޷P�B�Sܵ���eS\�w�Ź��yLm�4c@ڵ��yΕ4�.�����L<�>Dg��ɢhFv2�a|'�#W��V�9S��+,���v���!��6�?s�3�f�b�>C����7*9���p�6y�����[s��S��OMZ+�d������D�n���*8(��ic�\��O2�',�ROٿ��g�3K9�L�M�+��q�PM�<a���7����F�x���]�%�;'�����6�P�j_��Ki ���Ԧˡ\�Xv�4S�XT|na�֬)��������a�~�\wEY��nas0SNNu���L��+���D��q�v23u'��L�Q��ϙ�^���O2ߎz�-�&y��+�'Q�M;:ӹ`Vԣ�����k��safBܳ��7v���_>g�,d�)�Y0B��J瓻�V��[�̢�V�d���+�06��$<�E腣3���f���$�p�qZ�ل�N�}�7j��h���>�a�"����R�~!e�\zs�eg�ډ���lo�Зdf�;�q�K�L�U$q�g�M��gTX"��xy�ITS g��XQ�3�JN�Fr�#3ؗ]�b.�!�+?�bur��2Y2M�,����"jN"ZȈg2�f�S�ҽ#��&�ʜ"ِy��BF>�1����8��[���N5�t�i�����` D'�[0���Gᘣ@HۈS�o�����*/2S����q���Q�xY.�-����l$<\�	ռ!33xt���tQ.����/�<�;j���Eƃ�R$�Ǝʎ�kˤ~؈S�f��t���V�'�JN���j5jd��Pm�;��[�L���L�7����,�kW"3�(频t�^�Gf�!?�ǎj��y�]��!^��0Sv29ε1��e�+I���*x&C����c|G��:È��]⾙��H��9����0׮�K<:�H"o��fj���b��Y�ʗ���ChIN��n�؄����8�Z��{}K;�g�	5fi�3�����v'�I���P���̳��&��f�Q�
�F2;n�v��o��َPs]���<�jR��@���]����JN������1��zZ1��Q��,�����*N��eXz����j�1�S����"4ϱ����l5)�P"�hdG5��Fԉ�
�t<X�o�3��J��R��ĸ4�ц��M��ˁ�X,��$��m��p/��9��ݬ1F��u��M�hې����-!��9�b�����L&t<��ơ$N��mi's�w2?l�UU-4���u�<�v��|!�:?�a>�jJ���&��{+��6�Q�i�z�B �  ����F4�s��:Ϩ�BK����o%����9@0g]� ����f)E>LK�@�PW��ئ��+l��Lv	�<�NF>�!���E�_Tlw2K����[�(L�LWb�$Hfx�*�'�������T����~�V�q�6���*,8����,���H�P���������Q/L�������� �	�LZ���q�����}I��F�C-"X�Fy,�"���숪3=�~T(ϡJ�0�q���6���Gm ���DӚ�Y:��o�GTI���ߌ�;�&c 'o�j�(}MF���n��/��a뺄�W�.^و���f���X|�W���rI2n�U�D����.Z ��I�����ћ���XY1�z��\�G4�Sٚ�F�j�1�����h&�)�%,Ϙ�{����hR�$�;���M�����&�*���G6LG�g��-%�ʔ�6��a�;��˃�|*�X�t�a�M4@vP�Pq�?D�A8&�K�YQ���#*9�ʋ��:�7Ä�)����Q����}[���_��W�ո��H�0\z�D�8ıj�Hd$��xZ**��i*����ޞ:s.��ٲ�ݬ������Z�&[���:IZ�LR��F����剃�o��pw�w��p1l�N��$�=1�ޖ(�]01��l-����of.�V�ط�g��7jg�uQ��`��%�{S��L9��y��̚`���.+���d‫v���}�������'}�8r]�i�H���l�Lx��,����>J�qX���3ݷ'=�e������G6�^$?aJޒ�����s������}I�a��C���Nz�./elGeGTx�G
~�3��n�����>x�gTrU�^�A��Nǹ���ʟQ)��<@���p��A�*7Iܹ�sG.���=Y՞H������&>Q���D���
o���t�N��U�D���S
	M�Y�M�oL��?,�)���H+F{�����hg���M���BF2�c2���J�/,�.��SV�֬�=~�:�Z�l�2�Bx8��6E���l�����z��-��X��|��]��#��\�+.�6�h2��'��T�RbeGP�#�[CN��㠽��ī;jE}�����<j��R�A�B��=����±�Y�[2K�G�c �q�sf���G2�^��������?b��z      �   �  x�u�G��0D�ݧ�4��n6s���{����*Q%��!��Ȅ��H�G��I�h��~���0_�M�?�ٟ��H�*4[��!��H�C�I�Q�R�~��=�&���P)�q_�3��������o��Gȧ��R����:��:��Z�u�1;"/p0�--.kL����Vw:Dfy�Uom��c��6G�R ��5��֟֘��Xz��;"sAn"�49�����z���� 7d^��QS�s�p}���ʈ�p���\]�O�Ph#�Jś5�	���SD��Y�A1k�\�� �v1�y�g���x�������c���Θ��`h���C�r^ ����4��&�����T{T�;"�n�j���5���y��,����\�}��<.ou����e��"|�(�T��y�;�A:O�$��5k�5�c?��CD�Y�!�4��j҈9#�A ��uX���Z@+ ���32�IQ"��$r�M�D��'��M�����d>¶����G$?�u�Kp"���	���`�:����Ӛ�5��"��#2�$A(��iOC=�i��W )�`�'Ƈ����gχ~F�)B�N]ڊDG�� k҅ۑ�7k8F}�<�����g�#�Sp�uQ�0o��� �8b��t��&>��N?#��H&k��&�1C����|����-��{�J�!��G�"3��h�lU$m�"���u�\``��*(��e-��,�ϴm��8��h��=�R�3��"���D���>A�r~��H��j�C��v��$i������H\��H:�6"��'|j�ٍ��]��i��BI8N� ���-�����ȣD��gd�ھAHhp��5^ZԹ"������&~���D�CMru�C�
�aW��vw�di�n:��� 8R6�h��=��!�=��֚��������HNy��U^%���<d�F�y�5��ʶ;v��w��s^ڶ =8�XF�5�E��
�ؒ�p��֜�m�S���YN�� G��{�v�NƱ4_�],�p�m��1:��s�Iz#C`Eu�͙�6W����8<�N�YسL/g���=��N �N?#�$
��4_]�$�C�"� p��,P%߬aN_��o���9�lw��z�L{"\�s�����˛��������9#=���Qi�d1%?�j�X&#��@���#�b�?����ɓ$��t'<g$1wE>��iص�#}��k#�*QZ��6��%=Xg�����.�K�'�1C.�I[�*��U�0�4�'l���t��t^�ل����G?�G�X'_`�^���W�Ptެ��F���w�N�����c"&�]�f �Q'�Ȕo��Xc0������a�	>c\OU�9��( QSOK>8��$���H{E�����'��$$d�W�X�����YK��*g;�ND�^�ǗO3��2�c�y�@/�����Z��R��gdewDz:�պ�����>ns�o��G�LĚ���L�v���u�9�� ����>��-M��S����h��3��i�M*��� 6�-�L���F���ْ������|�B�
����s��Q�|�����X��I=���~F�ك3i��1\'M�z�h �xBS�߬�O�T�;�Y7��.f�|�g���3���-�xU�����7����*���4aG�YX��$E��5�b������5�)�����[��m��Z�*\�<U2U�;�X ��mD���n���T����z}E8h�WR+G�� T."Z�7k��l�HOcy���.ht.Z�iQp�w�Ę:��H l�VwFD�5y�w��2�8��!2���ai����X`���q��@�'j�:�� ^������~��I>�3�0���08U�w�D+W�D �s5�k3�Y[�vLyB�;�������IX�      �   K	  x��YY���~����p�f� F�@d;�c�6�I6��}�_�j�^�3��iU[U_U�I�Y.�O�!\
3M�-[<%���vwW��M�h�/�o�r���
�z�X��o�"i����"���#����ͯo߿�|�qC�;�v�o��gb�]�E�%]�r0u�������7��9�!&yc�Z:�3�?�c�&��4���:t�g�QJ���=���5�a"�rp����C�G���כ�߾��_�|��5�jϩ#1A�d����|��!F,g3!	�n��2A�V�3GZ"Vo��K2�L�D�Jl��ɞ1���N���!��bkA�)��	�X��z�S��X����`�%���]p1�P�^ҹ ��6ް�M6��P�jBRqvhn�Kb�&+�e�$M6�IMsкض&3�N��-D�B�)�p����(����J�t��ܜ W]!ĕ���ia����	p�������yRt�>��LG�v�z�]�n�Ig�O>��(�������	���/�r���(����������Yg3I��Ƴ&�Nz�2+�� ��:���>����h��Õ��YI�tWV�����|��#t)~��J+H���yЭ�k�bj��d7$Y���;���.;5�]��O~vd��B����������ᆧ9��/��F�>�+�F�߀����H��O��aH���y E�#$��s�H�n��=Oz9�8;|�1ț�� ��aP%�!r�����I�}�Vl;�=��u�,��q��t�zܕg�|k/(���B��y@P>�Џ�꨼}�(��)+��th�q��Lżŧ:_�mL���!�%]-%pǏVk�T�d*���M�=�i�̚!�����tj�dy�l��\d�!����sύ5�O-K??y���, �(�=ޚ�S�g�V�X��ᦎC�9���p�~(v�W�ʑ��=7�[#�1*�Sj3��ZNTU�����H����tB`;Qg��~N�h�����`�&��Cա�˂��ה�9+gҮ�`1��\]�6�y��D[���-�P@�0����#;��Z;�ƣߢ��ܥd��t��������f��A_w��BW'�z�K��N���l���BiW��r�����&�3�{U�m�!�Y!�
`e���·�6�G:\1�~��,q8��N��X� b�rx��R��8J�L{'������ y���Ȼ;�х��Ng�-�������
_W:������|(��$�Nu���ړ��D�a�\ҩ� F�0,)Գq��!��g&q����j1�C��h8 `|G)�V`�]/P�n��LW`b��x����(b����!G�3�ܪ6�G��\@Y�j�3�Pև�$]�U8��Q gI����ܔeG4���(���)s���t8��xT]��nQ���/��V�b�n9 ,��0�}�iͣɴ����#��I��K����\b.7$���,'�(ݕ�C2z��=.�w�;��:��i������K��
QYe��[����/�g�Q����/�[;	3���_��� �\�����
���>O771\�XX9�Yw����-�����D�%O9hn�zh�k���yV.���L!d��0
��S�UEm�s+����`\n��&{��V
��Y�:��K:��_�3�ڈ�j:�Q}����-G�j$q�}.�k[�"{�8�K:���H��!�mRƧ���q�f�}����5��?���l��g�5�x��EdS����/�rO�C9~���_Y�<����ZdX/�U^�_�oMs8�ln���v:�ex�~��u�
��KuI���qu����u$����ř���J���\�>ZpL�j��l;P��ǵX�#1@�e�����G�u�n�Yq�ڥ�B8T��/��MXB�{��X�أ��urlg,a�g0o��TC�Yx#��vC
AI��'*69�*|�r���.}I�v�X��έn�¸$]`v��¹��A�#�a�0���0����U����������\��1�{�����_A����T�/O�A�(����K���a�_�@{�w_��@�l�����t��}DL���o��߮�Eڸ�W��Rys�{��h9�Q�I��?ˉe�Ŕ�hCݣ���+�f�T��*��~��%l�:��h�(qM�/N-�I�v`�N�Q.k0�l�۪R!�0��q��W�^ г�����K:����L�M��m�d���t�F~a9m�QZ��#	��ӟ�x ,�\	�=�v`�b,]X�ƅӐѯ��/.O��c�J"+�i��xξ?�p��� �5�s#��K����|p޼y�_�Ɖ�      �     x�͘I�#���z�B/���1�q7Ƌ�&�A9D���;nJOʧ�4�I�4Tq�8绑1ܐ��$7�*+É��<����Q&�SZ�AU
������qMشNf�]�u�=~����*ݲ��uZ���V�.	ݶ;`�-�����:~U|�?��+]e�J��BY�xJwz@����#G.������4��ESW��������;���%��˟zpz1��:M�I�'8�v��0"l=�E>٬GHLHф�vՑQGk��_أs�!D��jz��t����D���L�h|d�GN���~a!�(8)4P��鏳?�t�1�"�uD�ȘÈ��/u��ٵN>8!A
\���~�k��J���GFj��C��ҁ=2~��q��R�0*�,-wmX�'�o�W	l��	)�Y�ܘ0��ɤv�j�p��_XM�Ė����$�h��y�}��_��($>�! b�H���xK�4�1�N��$,�C7	j����ͫ����`�Nr!�J򙜺�����sctD��Zm���u:��<�����+ᖐA�q�?���3G�rK��ƹ�X�nq��LC�Z�kB	��5���Ȅ��9B�-XϞ��!ʳ�͹�k�;�~��wǔ_E}��g��>(��NDȲ�ё�	�������x�&�_Hz�G�߻2��jE�a���M}!�ڎ���I��-Gl��	��[���Z��f��G&m/k���BjO��C|<�ڀJ�3n�O��ǯ34d�qb�P�h�P� L���B}n�rp�q7��˼>wh��_g� �c����G,�ĖniK	��-��Βrps���&�B�iݰ�@]�?��a�NgK�������WB?D�Ev�ܐ/UHJF���u�\��9�gD���awΔ�eOX�Ė�Ǒ�����!���'�_��4Ud/��N��s�r��������	Ѱ�m"Ї.�A�T�$�L�S~�u~F��'��e�r��Jd�#��:��4�ҁ5S)����J:E~�b�/<��	5$�b�����'0�#hˠ�ǂl閵��\��$�9�|Q0j�-����{z	�$�����K�m0��тn�K.:AH	p�h��|*@?wO�dM����l���]F[����n#��=kg�U�����/��q�g6��ƾ�oF��e�%+/+�H)�;�l��_�}�{��Į�ж�˫��x�|�W��J� �G*��������uu*��}�F1R4T�w�7 ]4��.��P�<r�ƾ���u2p*tb�J��|����_���R{�D�>v-]��?صg|i��صIRp����o�
��	��D�$	�GRx�8�-*���B�R��)T���7aX�I����"Ğ�L#�L���M�4K]�O]`�ʏ� ?���������O���pj��K�v��w��a^�",��Ųm�t��µ�-#*��k�C��'��RԚ�^��.JY��C�ڶGD���s��v�#��4��ХcKv��(&����_gP��TQ�;�۾]	r��[:Ў팕}q0۳&QRW�+U���=w¯~���{�Ҩͣ�����FGH��/��o;��r:���ڗ�h��5��A�
�G"D��-ݒoN���0���ʫ�A�����?���;i��W�]�;�-H�@$��o	���ms��Eؿ���'��D-��Iݙ$��m1v�[��U��������y��0���L�M��J�������XW3{�/v��ᚠ\f+n��d�Gf�"�jyחZ�r����`��bN�Ƴ7ޭ���=MO|��>�LX5�}�~=�(�}�CǏ����������\�      �      x��]Y��6�~.�
�#v"�@<�M�Y��c�5��؈��$H�w�,�x��f�U,vK�Q��R+T�"@"�/�A^�ĩN�J�RL��d}e�y˵���,c���5S�t���w��Z����3�<V��?������ס��%�[S��][�]"x��Q��ߏ�T�k�G>	���81]ʘ�6�;�=�����ě�g��%c�?���ajM���� �yG�;�4��-so��e�rf���9��Fu�++I��J�����ϕ/s��Q�2.woE����<-���[+QA'�"��6��[���[�|���j��DYb���f{�mD!�b��@�cª��	�c������q�ٞ::��[�U^DmB,���B���z��hxpp����*��6U$�VB���;��K�^n�η���E��Y��Z>q�����3a�B�<K{?#�"����<�B���Q�NF��o�"�̰��I-��>��Q%ϺD$2,e&^�\f��V�iD�
�6�����d����2�U���.jkh=h�P]�����
I���E�
菪8��g��>A�\[;�Bt��&#yn���v�s������Z.:�]M��@e})�{��M^7U��Z���L���*�s�/c�?���E�pld�!;�j0D,?��b��~՜{���VNfN�d~n��kʧB&�+Et�z��|ƌ�w+�"�	�:ag�\���H��cO�Et���[��c;�4NB��¶<��vjx���_J�Xr8XEP�;��u�)�[��5�ߑ_+�͆�@�nZ&�g�Ct��G�����<�Q{$忓�W�05b��nʯ����T������'�����i�ɶ���Lo>/��>�)4_���E��*v!�F*�D'�����V�2�ǥ��(��`���>	=j�ٕ��
L�J� k}��H	FW�C`鴮ϡy�y2�����<��C�TD�:�G��?U��$t�>�B/�*�]����}�q�hd�"t���b�+0����?.1杈!Z;v����YQV���s�<�G�C��6�&}��K��[�W�
����ʠ�Y{�E�Z��yd�
"P��Niz+J���l��"�D��5"��V��y��s��^0}'�ًx�����U}�#4���� ��1OH���=�P�σ������yt[2sa�z-˥8������^kﲩ�����D{�����.��~z�i�gE�&|^�i���0��r������b�����M��.�R�ex`6�3�h �,�p������Q�^2{j�ތ���|�y�
��F<�{��Mۻ)�����7��5l �@�� ]��U �<5����@z��q��QWg�q���b�=qt�+�N��0�iZ�1�|z�m �@�� �8���x�w~��_H��>*�����j
��|�u�`�����cq�0�!�ezv2��t��I�!�>D��k{�>�F)�3	.���ttoВ��>��F�3�C��Ԫ�y����Ԗ���NjϺ�A�8������s�k j�RJ��c�^]�G�_)ǀBPFU�CYU��y�(��Fvjp��?���{P�x&ggMz�+&#��`A2"B��gD.@�}Ъ��s.�,+#��Na*�ŶLXY�l��H�t�� r�}��֦5Ѵ�2�y�nV+�g�t]�˧����:)���:��;C"h��BBg�j������Eh
��dw���(�m�u[p�\wk|Ԉ�é�"=>#�T\���_��b|����-�Sǻ)�n�L!;1�Y����Q�6	6N�8e���16L�����M�3}�H���,rw��p���f�RV:@,�l����n���a�OG�������ǲ��g��'@���l=;"$��l)��x��l����n����<���O+��V��㞹�c�7�lE����04ۉ�:��l����n��!O!�Z���i�q+�ƞy:��M�ja%�O��ny������ͧ�����]�NQç��ox�[v�pm��y4��e3֖i9�a�e��aU��*w�ݼ�vN�x&:��8��]��9>����}`g��ӝFY��=�mطp���J���r�l۝�v�nw.N�����D&������}��Ჯ��<�ط��3C'`'.�^��	�|�������Zt�8(�6u�WQ��d�|iiQ�N ]1B�:�K�U�'�S	/p*a1-Gӆ���<¾�S	�z���3���}S�Z�����A�������w���Ō�������0����}��:gT�� e�޴t¬u�Vu(`2�#�2c}~�N�n}A�^��E'�c6�S�%�4}\^���S��æsoʯ u���\��Ҳ��s��H6�n }A�.N6����Փ�h~� �����{�qS~�W�!�B���ʂVA����\����*p�����o��n�x�"{���ܔ/�ܥw`,ŷ@�؛з��̍�6�zA�RN��R���*#.�[�_g}�Cf��7��R�|y�%튱�0�7�Ҝ�"HH�� ,����dN>�{�:>�]l/KX���H8{f�yK|��<�w֘��8H>%�B��$4�XX2���{�O�F�g��g�zpĠ�#_�! i��	�g�Ql��s۹���q4��&�Wu��L6�)1�z����8U�'�>e��E��SC�i��dJ�8Y�Nv"���ӗ�Ϳ>J���BĢ��U��m�ݔ;F{�M�����f���I��G�h�8��'��GhM�7�^^���5-�!\�'��)�s'=Vem�����8٨0�L���/i���g��D&g8?s=���BXK͓U��,���)�����n}A�.N�a���H:�O^�����q<���9^JuJݛ�em�
�$�%!v���t��ɱ�~;����IW��h�)�+l�<��&-����SSw,vS~=�T~�Q.Ҵ�IL\��Ō-f�`�X�,F';�e���S���Zxhզ�ī��F�g���co��%�m	z[�ޝ� 6��'E�I��/A��0�4��qS~��gbɋ��J�(��r�h���W��d�<����w�����ZE�*j���O��r�a��A�5\���a*�6ԛw)�;�R����� >�ØNLzSn��Ql
]TyLe����8�`��������ϗ���z�x7�+k�p#��9���� }�5.*,T�O��������'�t!����523a��[�1��=�gU]q�c����5(�GQJo��ֈ�1!�
Qe��lp�U���{�{�m��z�%��K�(UgG�=qt�Y+kă�fe�b�!���-=�ҳ-=�]��>w���8�g����'=�W�0Ԯdb�Έ�P��M�[ļ��ŧ�c�4+��^HF㸽X�%V
Ӫ�H�pt��g�pv<��=�uà7嫕B����I�63�:i�m��"�x6��������'gʟ�;{����}T��s���@��Y��;�����E��l�R�vNaG���O_|�x�w��/>�@�Ƨ�19>Oj�a>Bu��_
U�v��&���m��?���1������{S�'K
�vpH�ߦ���q���ߴ��Z��7G~Ӿ�^�\R�AS�}p�F��]ӷ��/��U�ߴ���Ӣ�g�rL������CȨM���`B�'�h5�Z����u~��~�'���MX�⚂�K��� 8BU��
��j�r��{�v�	�e��]��\��;p���Q�M5���$�ɸ\vBR��܀yw��55jγƠ�K��d ^��<����U1ş�N����kΛ%ǹ���Q��ͨ]�ō$��o���p�g��sa������y,�}8A��#$#6��!=TÊ��ǰ���D7M�w�K�;YyG9�O�:�>�<z8lx���(<-n��܈��`xrV�)�	�L%�[?������^bW����Q�gcQ���\�R`ٟ����Ru�z9ᚩ��ռ.��懋��̴�j���e��.��Qǣ��O����k�lXV^] �  ��SG�<����Y�j��eT�gU�܁�����,��iR)B�����j�����|s�ˌ���n��=�ch5�l�!0� �Ǳ�:j$�䊭���ic������:���кJKD^kS�k�~hf����m���$t�m�y�����T^��2�ݬf��_�Uԍ��y]�@!�����J�5}�jmQU]�OP(P5��U�)�[���
���4��X�`�\�|:a�p0:�~��+��	_;پ�ڠ�l����A����E(�07@S)�Nb��VP1(�;�f��>��5�h��i���e!U{T��ڭ�#f��R�u\׺�"�����_��t �����C'�tݱ�7�A�vG��2�h��Z�z_~�GYZ&P�kb��t��l*�H�E��D�t�F,�g���qc�)�X���ߑ�x�U��o���      �      x������ � �      �   �  x��َ����5O���]��+O2F020� 7q`p�q'�{��}a�$8XР�~�~~:<U,z�t�<v��Z��,� �RV-�$e��# �Q�Ȍ����ŏ��|^ �?X|W���&��3�.u�&��棖��,���eA �@~��%!K��^�[]�]�)]���⟟�~��ӗ���A���Ɨ�!��M��T����M�:���S3L;O���e��y]�����@�	{��˫�Tu����\�I%י$�V�$��Z��R!��m��;�> �B>�y��J���5�f��k; ։����A�_>������U��a�:��z:@}3�����%������3�ymޞFi�Y֙[��mh�k^^^�/��iònԩm[��ȉ����t���<n��Ϲ{�_�D:�{w{5�#�l:C
$������|U,����GW�(�\�� �*]]gy���h�k��9 �5��&�g�-��P�����t��.�8�)�@��뗅bD�E�7���}��97��5�&����;��L|ԣ����
V}���-�r�A�(��J�7cp�ųY�6@��c]0E{mtB��N�@�Q3�Σ�A��v�:�|�߳X�Q�}�b�����jG�U���"�Mr 2d �$��d�2�5ɂ�R,f��H#/�,]"lP@����s�ʙb�.�D�A�)�T���^W%��۾��6]�Z\p�9H�v��6L̰Q�2y+�iV����l���W�/��#Ϸ:=W	~��],1 z�ع��j���:C�LV��IX�^������'��vER;�ŏ?�Z���7vm��� ��*���Ep�#dp(���i�N{6i�ڤEQ��$�zl�pl� ��T���N���4�B3¢C�Ԇ�,;���%憄��k�Sb �Nu���@�K�ta:j��镡c�����Y~[���N��Z4�0���9H4̓����%��v��������.b6ˎ6��G��9.�ߦ�ˈ�S],U�{���X5=�W��f{�.æc�H� ��&�f4�p�֡#� pBmmWRwx�=�l�Ck�R[@ՍN��֥� ?��GWM5��V+�ҙ��^C3�̡v�`�8�������4�E�9�p2��H̦9&s}ˣD��t�N�Ժ���)^�p����&t�q5��k��|9�x�t㺱� ���n�#���evʳiv��i� ����X󍎡�8�	��}�� ?ȫ~�aR�A�B՞)���R�L�U= �� ;L�t2A��Bf�l9�@7W���j���ɍ��(;��Wa��78gO���*�d,N� U��>�;)&�]��R �� �.��1uv+B7���%:dYN���F�A��	f���9����!��9f�Μc�x�fl�)��VD}$������&������A��6��¤v��ts6�d�?]���h���N�x��������nusU�]>�m1��r�i	'���um��pex�q�0�{fp�Y��_?�az�Jer�ý.)?��[U��yT�!��ϥ��\걚��ʡ� r
�.2�ٶ�T�$DR+�Q-�kﳉ��K�����A\��`j"���;���U���n���(rɷ�!8N����2�e[�=�!��(�լ�����YM1�;rG�r��+��.�4<.��NՕ�h��Ff��������&���]w_#;?��-��Jj��*o�^F��9��H
>FYo�f����y�1�e뀞��%�K y�"��y�. ���k	�ew	�K*��ɓ<�����^e��$�g�YB��@[X�:��B�jcm$a���"ʢaH��8%�k�l6���c��(6�3�[ܭ��8��fKڛ��A��8>��܃���ڑ��������:?��2��`�� dQ�I���`p�=l6ѡ�Xﰡ�i����س֑:�U�u�t��śX����Uύ�V�;l��
aS���� Ø�b�8�VLi�y>uZs�ݸYY����,��r���@�y3�`�rv��7[q)� �<�����m��(.AA�2�Nܮ1A cT4Щ���o��f��Ʒ�{���r����P�c']t0���b���@o�!����a���cҳ�%��Č��>�Լ��hJkS��g���N8\��:���)^u�W�~��'幣,�SQ�����tpQ�y��ݪ�-�<�u�'>/��8沜�L�F&�)�JW��tv�t�q�|�ぁ��jF�+�!+��h��օP `'�1��h�Н���Dk��
ϧ�	����������w��%8�X��(Pp)�@D^7K��U�
�5Ìˤ�)��\@ V}����?z�� �f��jtjP'�=)����l�C�^zDR�q�ͤcjP"�����x��7�x�,w
�m��$f�a�K�nG���V���$u| |>�#��}ߺ�l�c�1T��b�։������g�H����ي���Ң�=���j�5Ι�1R����׫ ���4'8�i�-�)����qF���Y���'Ώ���f�b�c�/�ۍ7U�X�˥�'�g���H���oj�f�lq[�F�^%`���e.�#���}����������c����w�w.�f�}
��ƽ�y IM�:����mpγiq֯-�j;�p���<�Pc�}��&�@=q~L��0����~f�#�l�ro��J�\��X @���e�1{���&�gm�CS��pI�A�
�7:��o�jsG=W�u���Vhl�����S�y�d�e��w�X�+�*����0M�z<�f�������	�mk��s�^7�;�7ȳ[~�z쏴!�&��#�uIH7�r�p3�U{!���k�&���.�g��̖���� G�u������K���s��C�������� A|ڨ      �      x��]I�9�>�~E��n���g��
����
����{��{�J����!W�i�ዔ�">�}���#��Ҍ�� ��y09X)�M�����?����@�� { �H�����g-y1S �h-����X��~}�������{��|�0a�����뚶Ȃ����IH� D�XB{���Ǡu��1�����U��5 �.�[Vtyk���}���Wnq XT�A�M��?���o����6˨��N��v��|���#������m�:�?�|W:u���A�G^�v�����Xk�Guۙ[{���YO���W�s����S$]��./�{fz�^�k�#�^�]^���ȗ�1$�@"�x���G�N;�e=:	�F���?�Nz"�H�I_�߄�5��sQ���6'2�	y��h����s7`7�g[??Fٓ�O���������쓿Jgʂ��gPuAӮ�2H� rͅ`A��ݳ6��w_ҹfp@]Z:M�?]�g ��r1�I� u(U�_:��cO��H�zV��U�dsU%��X3��� m^D�ҷ�m���j%�/�ңn0&n?"�o�E!{VU}޾_���\
1"�Ӏ9!�y؛ϝ}L�,s�^r���G
^ ���y��{
�y"�/y뮮@����K~ry���v&'�>��v�-�`.��[��_N�:g��k�]�K���=0O&�$�^�u��F�����R�J @�8�2� oJ.8�@G��X0E�1���+�'k��G{d�s��bdQ�������}%��L����pr	�J��(��ES�f��2q�}d1�~��G��"���OM�s"��a�IS]S	#E	?��[,}(*�l"9�+�y�8�SN��Ρ�j�d��E�sj|yg� ��#�
ȻՒ���L�%�9˅bg�A����;_�5�KƲ��6�Fk�CQ�J���9I�gH�lT�<*_ �y��F��C��ZC�(����7��_X��pm�ր���ƀuB��#J]؀���y �.	c�|4���@���D�u&��+������3���&A�)�q���#�)bw� �}�س�I!�U�g�!'x� �gI�	C��y7a~��K�<@��|3a����gE���)�K�Q�g�n=��a�C#���-��tx�[�wJ���H=��|����!;H�Gw�s�7;+�\1t��|�;�a`.�X\��[.Pq�� �!k:�j0c_�	e�c1����U� �.������� ����0��� �M�(8��¹*D��<��'�{}_=y�M,rs�U�q�+*�lv@ّ�\&ۓ7he�P�,c�d���?O:�k���<�� �+w��i]�fyN9�Ø<KvђZ{h����"1��.�%�]�r��,-ߚ� ��d�1wA�%���|�̎���m*H߆}z�/�h�BM��LA&��46���jT�r���v�3���@��N��'��rh"X.l#A�ߙ
�z^�x��+D��}�*wF��/#����R�d�������ܓ����ģ`��ţ3�pW�7��ߙ�h�zT;2���]S	C��$PLp�:��0c>���/�k��}W�;U"��4�.'D�Dm�v�sO~���-��)N�]���/�[��gxmZN)/j�����sMS	�/$^p0�:8U�E���v����̑�!4�ˁ�@�Kw�J#�YO�J�ɠ�,|�U��+U��= !7�5w](�F�8���2�*)����ƙ!M��c��uL��Ri<~D��=+�ޘ)Q��^�m�|�Q��0K����K�$�6��Y��dk���IRE�<V����9�.��a�Rx6�aD�
[�Q�e��_���������c�ZTi�;d�*H�؊j汄�F��2"lp��Ks�g��	��m�>C�O�[ő�[yEqR�4�&��$�M2��>�u�� �,�"�%������bۇ�o��혴ה��Ҝ�U�Tw"ly`�q+U����p!+<�ж� T��k��N���{D�d�"P��]�E��
+�����T1w��7��Qp��q:4������ɗ���3e��G�2Ik� ���#���mc�$&������;�bM��)�K�o3=�ތ����*S�]t�� 	�,{E�5qD-ZT�Y�E����ұ6U6�Ĺ�����%U����@�F`B��L�6���L��*]H33��R�2������B�^���L/27�BA�,
@B'揑�}iC�s��|4i2�-BUk�����ФXF��V�x���}��f�,BT��p��KR���llجo��M�9�����R��V��SRq�!�;�Z�U2�<-��hY��h���`���؝�V�|x�zw"l�f6_�8
<�Q<d�� y�[��A�8���"��z�4�>=XL�փ* b;h�󘹝fһ��XJ(�NJ�z�� i;����P���o��j���ޠ�G�Ȍ����٠�'"����"?��	Ǫ��!�r��B��?>A��wZs�22�G��cꪎ]�R��]FG&�$bE��e8�w���D8K@w�x�"A������z4T �|���H�eT�D��l�8�uOˌ�NT��H��'�H�)�q3뭛Q�s`hsU$���OY��$f"g,���C2Ds�,/vk�9KR���&J��An�������#��P�E/�?�l~VQ������yr0^y�X�zƴ��&�F|^�r��s/�1��%�����ڻ�^�;�#"��:�M4] �?Yavg��l�0�^��`Y�n�݊�H�+�]/2�rb��֣��ѐ��.�b|��\�>�0SgSs��$��j��ؑ���.|�\��HŬG������^��΅�.��K�0�	Iq+F K�����:Ѿ�Bm=�9�����'.`p�� Ȯ�)ʎ�գ�A��Mܽ#��Cy�?�s���B��ޮ�
"��:�}���G�l�ױs�;��^=
�A�'��(�sʵ��S����j2��#�s<ͳN�	�[T��+([e!<�Kh-G�v$|��y���a����)
��/�賢�%<a���Uw����	@4.ܮ'�|����	�^Կ���eGl�)�#��p�TWU��@��'*�1�ˈ�B�����ra��	�ع�d�9 �'��'B�K ʬ���~�yW� ���	��k&R��l&� ��ʩ??�Pp��M/j�e�ɾLFD�m;�1Y��e=�/�8��Lɡ��@h7��u�#�,�4���o���	���0�!����n���IǞ�*��jk���[h�#���;/��Q��������m<U	"������H�3r�֩����@�N��=�<d�S���6Ɲ:��q�ҋ�q������,����|��z���)���*���@�#���l9�X�i��Jk9�iO������95�\�z]0�JE<��p�0�� \.�����cW�<���g����<�¤F����ã-঳->��(s�i`۾�2<>�l���p�9'��0L�{cB�r�c)<H�:ƃu8Kf-]��mvg�qf�p�Bԏ�����yJ���3^�F�h��.'ҕ��1�Lƌ_ �g��k�I,��5`ˉ�w����w���d;o ��9i��tr�J��7vn�_e�"iP�LH��i�֒��3�aϭ�dn%�\��r+˅���(]��VϽ��F�AϽ����qx�r��D��Ŀk6n5�}���5/��i�Ԍ�ĺ��i�r�U	��.I��w�%v�&���Ԍ���]%ްJd��z4��ҏ�R�J�3.��� �@@P�Lyi0ta���uT�}W�{UB'�2�,���  C�E7T���
ȉ�fBAk(@�V	ջH�e��ye�-��h&KX��_	�����%Ť�t�RIQ�$ݫ��}�{E"�Ac� �u�
u�X2�	j:��� 	��T�F��lL5�w�x�*�x�������]%�6�:1��Jj���������}*�� ��`��u�x�d� l  �� \~1���t80��XB( �Ɯh�*t��.�Q�`��6"s�&��+��8|B؍�>����hN}}�tm�-+R�zh�ZDr��Ղ�ώr^��u��J��i<$k�U������U���br���0��y5k��r����'f,��� ��lf�m�����\���L:�\&�E[���/�z�!�F��I��3�Q�m֣o\���}.w�9�q�ά�ӔŅ�TC���J�4��K�k޾�M�D:�����zt�â�5���n#A�	�k5���i!�����R�����D3�K��u3�
�ZZ�R	�Լ�s�k�����Ƅ�U�׼ߴJ�6.�e�C���J��e�H�&���MYٍJ;�:�]�j*�����*q�J���z}kg�@��)��XߡG�zpKK6$���P��$#ӮoW%�GSE�fS�Q�*2/�$�\%ַ��67�`�����#_�QPc�S��K@��}W��Tb"p�K�*�������U%����r���L[�)ia-k�{��{.�U�p��]6�.a<�gQ��p�+6� �����N&c������	��w�D�dN�� �%�V\���B��jh*m1�2d�����U�_�2gޮovi��>�� h=����~�����Qm������;z����33kY��o������F�Ѯņ�zT䨩i��#��9�B
����+4wM�j�oj� �p��1���'�{ĸ/b�(�S�B[7�M?Q�o�XUb9�a�W�w�%�&��Z�.��!�v�x������xt�~0���R%"`��z��4�M5�$%Ü��uT�}W�;T��?��ÿ U�      �   >  x�퓱N�0�g�)�gǎ�l�Ltk3v�4N�&�M� ��bA��@BHx����O��,o;�*e ��(��[�*A��ѭ�D�y�\ECOI�R����,i�f���9�a�1Fn�]c54%R�ǺZ6ˆ�&�|A8�h�+
*cI�e�pqQ_Cz7���h�X�}ңS
mq3lL��[b�^\�!u�� ���v-<��t�;�h�C0��g��9�:>�$���X?;�S�I����()��H���ֽW|��R�2�2���~�МЎ�R��N��z��$a{B�������ɾ��_�	� x��k�      �   �  x���Y��ȑǟ5�B����I2���{��_x��x�ǧwY]�ޮ��R�%发��I:q�#%!��Ro���;/�O��<4ңƬ�N��?}�?r/�:���sl�n�������'F�ω��������kƿ���31.�_8��[��0�Q&Nd_�����Os�
��e��,$���Q(Ox+�����^�3"
������If��wv�*��	^���$v��!nj�0�vva��$��?�)��?	Ӑ3�5SW�"�-5T4F#�r�_5>�fǂ�L"�߼��09�'aFgr�;}%��D��1jn�\^��)���_aL��O�R`Gr?p�Y�x�Pm��5�������B$N�w���V���0��`���5 z��frqh'H���K���-DY�b0�l�k�8��UOR䫽�>��@�z��	�P~�fU�W��f������Q_�5�Q�U���UYn�)��ąIS�d�֮_���0�d_�����@��al�����;5s�3�]����MQ�����d`�N�ДTjkVJ5e�g��܋�,OS��3��Dŭ�μ�F1�I}���_!2���
�{�GX[q�|�~��@kU�Y��Y�~�my�j�G��^�)d���
�:���̉�&��������oO|�].�;;�UU��k�[������j�Y�����s�c��^3xc����׏�W���9w@?�r��<`�K^_狾͗y�Ky�J�:�߃37���k������o��繹k�47�u�f�N�L8^tn�*��xPn�#KTQS�>w;��D(��h^��>8��CR�!U�.�Vښ�PV�P��Mm׆���[!LP�X'��܍c�Ddt ��SV��W�rX�'*t6��;G�1ns?��Kp��6��&<��M�N-�.�^T7|1̪a�?��kNd�f�>�ZWd��e�N��3p�`�9Ӟv��� KM�'^>e;���	n������t�Y^�^n�u�M�F�+���p��G3��~EtskW�2��V11'%�?��-<���I�8B?���o��Er��pf�EC2��o�85r�teߦ�{W-G��л�S��w99���
Te�о'���b[�Ǭ۸��p]|v��eˎ�~�gS��%��&8f*̀����g�BԺRzEp���3?�80�o@3���M�M
����'Y\p2��_��)E- ��1;;}�r��N�Z~����hq�r%ȡ�2���^�;k^�T�5����y/���#JU�8�?��e��"RĨ2�rC7W7~q�4�M�m�+�_	�[DHCr�D�W�D-f�ݏ�qz��Oa�C�
�=���~��6�֡'�9%�����kv��&�d�����:���������kѦ�"]9T�|�����>�d�Q]ڏ��:��C�㐰<uVw�k	��'�m
�ţW�[(ֶ�J�!Z�#Z.�����/��VO�s2��գ���.�t��/5c�lߟ�1�ܦ�o����
�+�,�����D��0� =��<u���{�y
��#���#&8�P�T��5O�MWt��'~P�����2��R)�i�:|o�cz�	5'W�,Z���]u3�ɭ��yHA i\�C����q���F'K�ڋV}�??rԗ�^]�����IA{�"s }�:��^���n
�������p��M+��I�Y�W�[ʇ<ks�5W��=7Q����Yߟr��VH	���%�'�������
j�AO��s�+�t�={��Y����X)�x�pU�A���"g����E�mA�*�kT�����AzE�F�cr��٧?���n/I�"���S���Y�@�v�*�O�*\��jSH�v����<
f�g��vĐ�����A�Nt�Ʈ�n-��!�SQ��͟A���'�L�Z�>2���Բe3{����U\4���ĕ[�G��J[�"	єb��#O��R��Zi�U�Ξ: ��؂�"��w���zq��Y@Q��Z����|���\�F���b<�,�$l<߷����&��G�P�	]c�8��LR��X�F��F�mW@����7k3��Lb�o����?������5��=:�.Lj������4v���*�J�]b��n�J�j7�.��Ƶ�j\+X��G���e�e������M�D�! n:���w�y�%`ד�]x��y��Q�z^7:��/��/:�hH�(Mv�~�M1v��{G� *s2*>�}O_w@���N'�:��B��]���O�@*
�"MldVw+�ŵ�V�6�n�E�V�\J{��2����P�C�}��N�NTQ�]`Ra��<J��0S�5��W	�j�HK:*ü
_W��m�[8�}K�����hU7��\�]����Q��-�P��A)Y�Sl�V�ױ��
���T��`u܁(JʺR�����9�}Il��O�tB���Q����[e�$A��k|Dͳ"rk����ă�;d�hI�y�]��
�Ԋ��E  �jj:������^D� !c됱o��8��Ƿ}Ұ��'-�[��)�}d X+=��axN�����s�rcg�=UIىn���R�y�	s[n=.�A�PxJff3����aF��6�Uv��0���d�]�Ԁ�[J����6j��ͫ�V8��:����ᮯ�t�e���| -C�^j���^���BZ0���f�$�۠y����6�\C�
��?'":�v~�������~�`1���i���c�	�6޽+t�}8]|��<�DB�\�^�l_�D� �}��U�Q�i�
���� �]hb�D��]�����~��\භХ�F�� �`_1�b�[4��t[k�����
�� ��K��k(s�Ӈ��'3���L�r�a�z!�U�5C�7� 0e��T���25T�C��_���Lm.Z?�V�E�P3Ii��*�,:7���3��|��*��}ֈ;-!2�<H�.(�݃�N�Z'}�%�Bբ�U�����~�B��(U�-��?P�6�v�E���3��1��������lk���2g/I�~j��V���+��PÛr�����;Py%"Z��7(^f�UKQ�F�&u<5A�u�>�������$a����F�ׇn��])�u�J�h�4�7��Lǘ���Y����v�@�F���w���M�6Y\6��6f���ፊ�܊�mѦ����Q����t�n�v=��	)���������� �����j���(-D��s�3s�w�ҁP\B�� tyDFx��s�n�B������.ֲs�;'�A�5�.ǫ�"-�}�oZ�ZɍVw�ɕ7��.}�Ux��M��w�sA�L�[�
�P���)Mۚ����Cc�%n��Tw���
�s�%a��� ����޶0%;����J��T BeTװk깽yhU��+�,k}���]����@c>e���/�Ԙ|��A�����[xR�HNf�bH�w�j�&j�.i�˵����?��B��'��\��7ī���O�_~�|���      �     x����r�0E��W����D��Ȫ�6SOw�в��X�c��K&Ӽlm2)���J���l��@1��q��jJ�\9� # ����$E�Fɢ~�;s�[��[c�=�l'��t2 46n8*��>W-�a&k�Yo���`�H�B�D$�/϶�oo����ʗhs:�k��w�r�P6�#K|AA��S���k��_AL&h�@e��<b3�o����P�͚ɗ`������wȩ%��ϗڜC#çx!X�J�Hy�^�?H�f1����c��1�/�S��a�b���I�qr�+i/�_��>�癄�{l\Q�q?�u���>D�p߫8���H�Z�/���݄�C�8�ڢ�vð��C������3��=&&�P��\���)�WD� _OQ� "-Ţ~ѶM��bq�A9���y�آ>xB��G��s\�9����}���KƯá��T�����ې�����OKp�2A%�/�T��$�<�Bׇ�O�t"%�����K��ƻ��]�*9��p�ũ���]�Z���V�d      �      x������ � �      �   I  x����n�0E��+��ʼBXV�T��v�e6�1�b�����(}D"w6����ƬW�Öה�Ib^(
U�������&���^m-�BR�a�R/S$-�w�UU5ϔ�D��:M�6�[P@F�u�ˢ��>��FY]��96 ��]�7y7������u�w�縞Ӥ(���S�:�,-�c�d�+��ȵ�@ `H�o�B�q�'�&�h
M�le���+$��N���f(��д+��/5L�N�i��)�kJ�ĭ*�f�ʩ�.1�o'�e��k��<��hg���3[l������;'�Nz��̍�~7�{������_�      �      x������ � �      �      x������ � �      �   t  x���K��0���)t���$��L����F�� I�m�ӧ�=3�e
J@�����)����p-!D5���Z5��DD��rф��	��0V�7ۢ�#�w���:T1���d{"1I��%9(��������O��s�T|�PZ�҆�Ü%��p]ḝ!"x�N�r�P���/�Nc�=�m��9���}�������d��F'��h�o�Ȑ��J]2�IG�ySte�wք4+GB�JMT��؆������D��P�2$Ѥ��4�B���u��x�x�j�x���f���4h�@j���k�W�������bRyrH�D����c�y(3S�R�	�����%���������Yq�M����->F���6�)���?"U�~7��>��{¢�,�s������T�x=}��gE묮敱&�ݦ䢠lh�=+Υ��=�qMs	#�,'E��L��_:�<g�.\j��O&7n��z���\*��\�<@��ժ��)$��2��aԴ�3�����B�*c�e����1�m��q��z�O��/ϙ��|����{�*��7��ן��Y�U�I���_��$�Y*��8�)}���o��Ɔv-v��n��E�L/      �   &  x���Kn�0��u8E.4���q�n�8��89}qPI�H����4��tzǠ ��cy�a �f<P�x"p��Ts��̕�r0�We;� @��Pv�n���/�HZsas�������-���w���!���F�	ɉ��ݞ��u��P7IkBq ���u�\�8��FN@�F���n�ި�̖+��G3iR�E��&���Ǥd_�,�KM���\9 й�]��MK5M�F�+�F�9�y�=tO|J$"��(T����^��X�vǶ�"hJ�ն�llj.��v��#ϲ�>Ƴ�      �   _  x���Mr� �u<E.��H���P4~��3i7Igؽy����]�f�@�[G�c���9�~���TҺ�Pǌ�(%mc�y�6v�1��#�z���3�+�� 9au&)GR���̾Q�N ��#)�q�����Tz�\�7�iݝ ���U�hx��ʰ@���q1�j1p~��頢�EJ6�ھ,��Y�eJ����ZmC������	��У[
����v���-���aA Y�t���)����b1Q��a���
J
�W�r��%$e��49�_*�N֤ΊS�Y�f<�W�x(+ \�Ƭ��P����Xp7W�)�7��^NO�8�Ư�$�I�}�Y�}��      �   �   x���M�� F�x
/�T�
&��dC�Р�O?P��L�T�����B��8�R��xq�yD$�F��Vr���Vm:u�K�t-Q��.����~〈vk,���E��B���=w�W`�(	�wY���wU�d�?��r� ���Gjf���k����j�c���LsG�?�̭�3�t�Uf;�]b����,�|t5���|d7����@�8�&Fz	T(5-�vh?9�\�$�����      �     x���ɒ�0D�3_1?0Di�8�gG������z���t�4�+*�2���^$4��h���F�>�����^��-K��[�_'Ii֬u�F��O0� >@łƄFD�7v$�a �jI��밾�������c�z? �:��De.��I����BFJ��� ���X� �=i���	�l{e�����>l��n���n���|�� s#wZ9��H�mA-����5OZcki8��3S6|<C�h��X�H��&�l0)�L��s/�9M+_�i���(�f)�<A��Hb�"��6
��iw�l��iO��-'�-�&к��&U&��D�&L�7J�-�U�gOMP����R�4-�(\�_ӽ���=I�1��҈�y�r��ɏ��Q�.�/ZOJe�7�I+�q&Z��34@��HPu�zRtӜbXP�n����7�sR��$O�|��U�s�fB�Hc*��4N�k�bk���K]�ēfOW��>�m��=m����'!���C��f�"K8�� ��i�Щ/؀��M zi�v��nȓ0�nT� ��m�Lm�w�Am�v���J��M��z���vd�{��I��0<	�����Ƞ���NK=���u��4e��=��;6;,#��B�,��zM���g�� A����I��R��ȗd~Ҫ��~F�]�Ҥ��7�	4������h,�j{��9�B�;'r�rs�
:��v�fb1�o�^��}P����%OZ�i��X�Ͷu����o�&�4�M�����䥒��:%��aL]'��O����(�O      �      x������ � �      �      x������ � �      �      x������ � �      �   �  x������F�m�S���ɺx9��rp��8�^�`ϐM5��	���>���Q�ZC~�3 ��&^�*(�!iv�c��.^�}��)�1�0mw�����{����Gq����_�q.�o���7|���į�xV�Z����s��鎚�0���"L��Y���`�k��E�i� dA��-�� ٤5��z <���sl�9�c�� "#�V��2���4�v�ؘ�8�����%r�߯�������H��t� �n���r�ė+�P�g0��I�1�`w����ח�#Y�C��dX1�HҺ	�o��ʵ\ź�Ėٮ�T}�I����V�lV��o�؃���9����q26�>B!��F״@q�n���q�ݓ>�A��t�4:kP�� ����&�m�*��(�.MYMM��lr��a�Sֱ�m��PIxF�����E�:"��v�\�m�t"C�3j�LY�C�AJ9�,��2�ˍ���WӜL�F��\�ǔ�P�h8 ���������
���R�H7�z���r�r��q_�;�_�3.�&)@I�EK��pfd�Dۅ%E���S��R���%p�3��YƘH�e�I�gFѥ��HQ�u��C������%օ��#�F�:�� ����qY��q��a�	��y\�o��iD�MT����,�]žaqO`7��q��[h�& N(R�X�fA4c?B��p��粪��H�
#QM$��4��U
;u<PX���|��[�!#�|Q~��S�}gl�d-O� &26,��Z�}lצh@����wÜ���r4�����0*���1������� �3�qO4��b���@�q�^�����a~�!ϐ!>g	�P�K�Y&H��
А(b�`a�Q쬼-a��g�IG*��+H��N���h%۲i���������ػ7��ֱb��;�xܡ�Q}%�?c"9FJ��g�l<�eD��x�C���)<a��' ?��ȄPF9�u2�YY��#iш��M]G��i�^����j���2`WcX����c=���Jg,�v�7�x�K���"}�����oZ���x���P����ġO�W�*ť�lh�9	t����>�U_!���^��*Ob��@�k6�p	ǳ��KdOg����[NHՆ>?��XLp���6U7��Ђ�K;�񻊉�4�̍6t�*���#�,a��*Ό2�q��3EN��WJ��p���7�A~RȑPr����6�9��yѰlZ���E���k�Sׁ����>�>�`}���2���XW�WŁ
��~ɰZ*��-^R����e�o�7t��gDP&Itx�����s� kр&=llul���(Җ�bQ�H�T�����<��𝵩�"���4Iӑ�}�Α��.b�"�2�cfg�r)p���$Ҩ��}2��������	�FN��X�Uj��ئ��t�^m	],kxY���^�SN�o�:Bݻ�2W�[#��[z�s��(B�(��i����P�(���]WI����M�����	�w���M=Ŷ&s���ώOmY�=��s��7��^� ۆ��
�p�?��
�0��	DC�c���Ӕ&��8�5�i��Jϥ9��q���D��]���c����:E��8Y�c�����l��:�S=�`�1��@�SZ/9///�ׄ�      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x��ZYw⺲~f�
ߵv���1�g�t 	$�@X{�^�F�� �_Kfd�޷���e��R_�d���t�o#4��p��Q��béLȲȅMiH*~b��;a�hEA��e�0�,Ij�Oi�'F�7��u0Z��Ė�~KJl�Y���.:d�ʚ�hz˾z�����K�n����s6,?��$_c|�$�Rk�)��������iRE������=w �t. 'ǻ$ĸ��,!��XV��YABP�d,=��2��V��t}�$�͈��"���(ϖ���5I@vпI�����O�$�	3T1���J��M���8��k\o��7)����M&-����ٙ7�"G|��v�*��1L�]�v՚�Y�s8r��F		�[}���dNH������{R3��JB�<(�֕d�+�,�	�E�6��ZF�k�^�4QE���K�.��j��ʇI��5���j�T��J��4_;ƕ��H7ݨԗ�&�ͼ�BNMl���_�ի:�2��!_�
�j+W�֕����bۼ2W�vՆSte�yWC��Wm���_���~e*Wf�7�no�+�UC*���@�a\�[ �(�����N�!#��%o>�4���h%Re���8�,^��݋�D;�,�D�ht����i��'ql6��iF��%�o��H��$�4d�`�3�� �(ׇ��r�H�����!?l:$�tN!��>6l�0~�8'��)���R�20/�'�M�i �w�Hɞ�,,?��<�K���D��=-oDz>�� z��5Ү���3Y�,��1�Y7 �����A$�/���*"&���]����0]F��$M��(�q�r�����j�$����&��ʢ���;޹7F�&!�-R�$U���U�&i,2)7��r�eŪ�r�rH��ԅ�/�"�)�d���zEi�y|mAf�h��"�VW�9����[S���s��\7�۩��{�k8��]x���-��r���oŶ���H
�瞾�4<�[�"~�u��p�{�5����ŏI5Y����V��	��?\S?����xq)��fK!#��=}�a�1eA*X	S�H�M���  ���t/|U�U��q�(��C���{�՞�b3�Z�Zy�|]:�xμ��{S��ԘV��D�ob˓��Iʙ(�8��^�rMQk�$"ü�0:���k�"�X݋s���!K���;������u�o���EQ06���0cIFDb��ޖ�c�uI�`�'�<Pvպ��0}m�{�f����8hTE�v���t�	���7���3c�T���=%��ȼ�2�U���d�]�WrW�������<o�,���aƅYd$���$.��r����a�^G��w������<��[sԘI�@��^���$��)E�V=��mǣc��s�3 Ë �@0J.1�\�.��MQ�����1�	1$f�9)n�nH��9�W��I��l�x�J���K������C7tӊ�i'MP���b�v�H{�ߝ��h�<e�\���c�yR���ᠩ+��s{�$�Ò��}�T>�
�IHD��{�#�bpUc��6H�	�`ˎ�Ev%��@e��o,i<��Π	QwD���L_S�֯4�ˁ��|i��j?���+B�k<}܎����Nҏ,�O�\�e���w]�c���$�0W���V��m^T�|I��E��JP�^�����_~	+Gޓ���l-�tC��b5�f�S�����R,�B3�^u4q{�:1����Y.b89��?����{j���Ua����(�����]i����<��bq�������3���N 0��F�3`��$�a�.�0$,c���Qċ0 ���1��ES��vzFN7�D:�Ǳ<т�����og�~S�S��k]�n�c�?�������-��;�ոo5Z�N�����l��^�lW�i��H�F�oƈH��L�1"2���~#�����cݲ`�#��]�!�B��E�]\5˨�Tu�'�M�!"��N�[��-�\���
�[V����c�?��?��7bI�*KֵN�Z�c��TU|mPd-�L���ɼy�fU�1�WO�K^�ǴeŻ�J��q�ݛ������v�|K�|��}�]��=; ��(���bH�.�DHY&��f	V���h�CX'f��BG�>�ޔ�d$�(̃�B6_
4gi� 1�� E�<|��l? �t�	� ��r�;�7����<�I&
ϙ�P#@B��B�xc�$�KX��a�4Kr[�[�XL� {D��C�XQ�THs�4F�h%�K}NJ9*��%�a �F{N���G yF��>��IXd���BaIC;� ���:��H��v�D�8�J,J��W�4��G9Sx���9���r������ �D �(@pĲ� ���,O�H�l��>� �I��</΄8!����1�v	�!�A���Ɂ�� �S8�%�{���o�'	�TC*��']jI�)��@�/�uQO9�'�T�}�϶TGhs��f�<Z[�J#�������ǫ�h��@$y��bUԄN�佲;�N�Ҫ��i�7k�ӈ�W����Z�,G���]��>5_i+\�>�~��o��oR>` ��QC�3�t}��O-��� �I�0�4I��v�U�Is�$a4��c9[����<�&VdEW$��㷣�: �C�7��c֖��$�
�eYzK1 m5aЗ�m/\Mh��X/i5��e�S<�,�BC�>��=���t}S9��y�Y5ߞ�0���S����-tf1�_R���K9�G'v��5D{���S�ԳR7�j(�5Y�^>���D�%OI�%Oy��ە��u���dX���[�̉��/���Uǘ�����I�^:a`ޒ��R�3 ��Hg(w��ؓzsӲ���SK�5�9tT�PX��=�˗G�x]�I�(sY�LWĺr.s^��y��/�@�X�5D����p^x�4�eYk��\�)-3���@*�)F{y__��/���IBk�˩�����G+Дh���)��F� ��D�����o��G�=�:���}3�j_����/������R&������3��/��YcQ2/r�P5j�&J�W����ʱ�����0��l�p�Y�[���u�;
+О�H��I���|�%�a�2T}iX2�������n����JO揃�3�G��E��T�__�;y����z���;�����*�-a��ѐ���u�K���_$���~X�
Ȓ d��͓�c$pZ�Y?
�y�d��Ҝ��:@+^S�u�� t<v��R^�g�{'(���n)h_�������DYt�A��.�R�G�8SB6k2��~�^� 8�i<��������ӫ�6W�z��^�!-����l�����8PO�	�<�B��M���#Ia���t徼l�/��cr�O�N��߮��`2SW]ϛ���moo^Z�O�X�>rǁ/˘ ��( EH�~���&�BF@�M8�����oY�K�Ǻ0>��C�|���ub�i⮎��f��J�A��e0X�/:��UO��hM�7�-u�$j�p\|��a�K�qY��kHf���{|�a<��LF�H�/t�C�U:�K�pD���U�R��B��n��aΟ�Z:�P�e��$��l-�������dm�C��ރx�qN���NI��u7u���>�tG%�b��,p��_���ρ�)�\C���zV"Ǣ�%b�a:��<���"i�j��g	�:E��i/�P�-J�5��\.�Y1��\����޲���>�_얹�N��Ӹ��Dk��Ϸ'�����6km��ӆtsVr<+k��h�^�����"_`],HR�G_����m���h{�E���"����1X&��/��۳z���a�3a�~�O��(|^�ڕ܅�+���r�?����4�6���7���Z�I]}����i��]�K0�>�d�U�9�������l���,�As��UX>�^R��uF��xWJ��鰽�m_�I��n��Q��̦=�3$�X廁�u�Z��ҧ{DҞ1�.L{�vg�վ�����7��m�p��B���� 0  ���lv>��T�舐qa.
��]�**�a=�;����+�E�kن:�/Zd�$0�y�I�(�4�S���&������)I��Z��~���������I�]���uq���6G���9n6����������S�ݼ)��� .��&M.�P?�}�5���`��T�wD$�<_.�+�~�Q�`��P�4�C�E�b7G�2�.�_4;T�5�}�w��x��]?��]��T;�f֣ݎ[�Ac��NU��f�r^��m�?D]�y�W��Ç&�H
�nYQf��w�ܞ�����`��� �:OYF�˖BB�8
S����g�?'�[�����#p	Y��ȅi�eP�˟����H\�J���q��?H�Ro���l��F5��@YB�(����ze�m�I�`>=���ihV�w�Л�֫+�:c����Wb�>�b7�7g���Iq�ݳU�b�YR�NOo�}��x}Z��>�ܖK��b����qFd�mYӕ��tr߿e��>�̻ʍY�fz~�c��!^z��r��V����p����q��]�O���Q���P��A�=�*����b�D��j���݁+}��c�0��N� RȂ��YJ�9O��#k�Z	�3��1��	?���)[���
��~7���w�S ��P������Mϳ��T	�J�G.�C�L���j��iWH'��S�s�� ���<Ǌ�y����m6��.��]I-����"��#��.��l�b_��'������A�=��[Y8m4z������dZ>ԿX*��D�������ʂ�$�/���;(V5��[��?�d$�      �   ?  x�ŖM��8�Ϛ_���P�B�o��v�I��S{�� ���f~��0��d3I�F��2����_�h��a0�!D�N/�M�)��mԩnP�B��S�)�'�>��UN!�
�}i�GEk7L��M�a��d�$�$ٱl�D$b��1A9�,E�#�~��h�4oN����ՋKR��D���Z�u����ޕ��p�O��8��w�m�_�N|�;�C{�;<�V�ӸTfng<�\�s�K�Xo;tg���9�aP�qKI
z�.�Pr˒�O,w�E<�#�i��"�&T�<7=�֎�^�V�ą���b�]�}��}Ѵ�L	�k�f�7�0�D�".v�EY�M�iL��UG�&5!ER�}���W����@E��Ύ�K�������*7)�Z��o	�]5=����r�����}0�Z��QN�4|����r.ɇ�g��{�>~?{x,�2�i6/��A�	,�XZ����&�O��_��Mw�D<M.,�	zf����?׮*�S��CV�ZB���K���ϩ,�T���G���Xe���l{!J�ؘOJb D��YLr��c�2S�A�I�Q�y7ԇtQ��Lԃ9�9�#*T�cr��X��+�|*Σd4�@8fo^QK'4�i^�{V�0�j=j�u�[�]N8խ��l�t����;�%ɡL�S�t��)=�	��4������Q	����X�ɩb3�#��pH�U��
M0b �FOs��]������*��Ǵ��f��8��}��<�$U���4��N�,܏�G}�P�	f�����"�m�w����SU�V������G�h��t0O��T3}�|�U���v"���"���,Rp���UA�0B�X�4i�6���9�V��Q4׎�_w�1$d�_O^�:Z������B��w���E��V����C��?��;�V�����|�^��zؤ
R��έ�D�T	�8����Ϫ"	&��%�b'�B�O�'�s}��%j��T5�[BsP�8��B7��e�>hUO��54����B��6&�m������7�N��A�Fi����x��	�T�a?��̫���)�>����C�AX      �   .  x���˒�8E��W�4�z!��<:f1��/��%@A�*��-Ua���S1�8q3ｙ5}�,r2 3h[)�K�+P�5]�]� ��Ue9�}���0yE��	xLE�pH9�}~ɚ�O��r�K♲��5��4M;# ��E�Q�J�>}`��񘉐���z�qZV<ʀ=a�}���ӧ��_�/:��tK�
�����ڪ���p��J�J�|���-��h% �׶��I/��������
�aOe#�����i 6�f˺TyʮT7c��nF�l^��75~��c�p�iH@L��>�~�Qe�U�on���S�^�i���G�����	9���g2��g0e=a���	���!�=��e4�j��t`ͺ� �h[0�^��I�F��	�O���X������{����EM7� ԋ��){��{&��1a�K6U�	 @��d�Jr�_n:�d�k�}��e�綵�����"(�<���d��������������Ŧ������/<DR|d��9�M;�����_����.u�/�2�	��E�X��*Ԣh����9Xt������ E�a����.*���:��J�j�4h�H�ou2�����S�qV��y�bv��3:N�eY-�i_��&ш����z&���v�!CkyR�c�����#O�R����X�3#c�ѤխM�̋&��mp�r�|@�|,|Gx߭tTƅJ_��ښ�=�&�ν����i_���}H9�(��I($���7#\��>T��<��E�|[R��Ux�Z������!���w��<�[����#t�]      �   �  x����n�8E��W�"_��]�f`:�{0��PoJ%�-����F`�xc��֭���uP�U�5���.�3���@(�_����ۗW�0e>��!5� �v� 8�m.����\�L�3��XȘq?y�����������v��tE˝��Dz���%F=��{�٠�A�����������Ɔ( ��s��{�w8xLØ�O���bf��`��4JOz��kR�:� �k�O�T/����3��# &�σ�±$LuQc�Ae:�%���1Y-	�5/�X��(,�V&�;�����_Jr%&E���D�e�ֶl�d����f������]m�����X�pn[+�UCx�
Hb.} ����4�`8�f�R~���>h�h��Ba�{ۋ}$��NHg�|Fb��r�m�2$���vs��Y�U����\F�,Z��n���ު�J�G�4!��?B'm�=`3����rUC��9i��"�B�n��.����YE��!�AJ��� �h��g��gQ,I����E	�mPa;�ꕷ�f]�売Ӑ[�y�6[�bê����\�"��=��;r�!�-�ﶍ@�N"�sq{�����#����XF�Ƴ�h\����/���ڭf��r�>�:�t�t���;�"A�!�Tܠ�n*Fz�U���?f�.;E�¸��#��K���.�Pn*��_�̢�0SG\�=dA�~�x�g3)��q�?\�j�4m��j�"t�P��4XB�Nił�����4�6X�s��f����?ԥ�ig�lF�G�����O�L�2����|�����*�`��t��d�C�Ι����y8�Oy��ڹ;a޺�o4�c1z�Dԗ��x��6� �Jw/$�Ȣ)��6�a�O�3q�67�'o�(f�O�y�?�����a^      �   V   x���� �3Ta����o�����w&�<����r��-�TwS?�!��Rֶ���);�`�;�4�����S=�l��?v�P      �     x����n�F���)������&����U��i �0O_���;�V{�Us�K#��`� �o�k����Hr�yW�F @!� �3?E�sI�fP��� ��=��C� �H�"8�$�[E�eD\�I�^��c/�w~��x�E�HSL�H��l���*�Ia�<�R|Z��&]&�iy���z4Ml��`�}{�bA���
�6+"���/y'^vjPW�Wo����Ri��V7�V7g��.���c����f���?��n��Ԕ�Mu���ZX�5�7��=>)}Nk�ׯ6U5J�:M�"���ЯpO%6P��# |��H�Zy�����-��{g�Oi��1�Z���r��V��Oi�H�?��$C�������H�u��[�i�5�M"��p��l�x��)R=����+�a&���<�&�y&[S޳��oegW٪���5��U�\��(� �^ډ�g�E	�pW���k&IE�p�䤈���%n�8~�t��)Oyq�̾��cM���ʅ�i��:Z�<��ew��"��O5M~������åk�7�O~7I�[�������N�t���|H�`��� �y_�¥��6�1-~$��/H���9a
��b�+��Ӱv��0����3��ʑK��d�]��w������9�qY��N����98�d�I�Yy!���Kj�͘0��=1hZ��B-��$ɍ��Xz���) "}�eͺȧ1�#y�'��>������ċT�;�}�Wrig�́\�ڛ����堚�HbP:��ۧ2�;蟸�Y՜^G�m�� ��e�?
ޟ�R��ʥۮ�XU��QK\���4�;P@�����!��co;^�х�Yw��@���va��������a2�%�On�n��>2����"�N��0w2�֧n��x��%���xS<�0<6)B�j�X)Ϻf�#���B��ʨ75�N��[��ܽUu�_��)kW���\U��^����k'c���l1S�!��T�e B��ʹ��P�e������ak��v�n1�*2[s�f����n����>�k��¥x�X�f&'��<�TWGthaA�0
ð�.^T�.?Ɂ)�<�|$���l�02Na������>��}�r���pȭ2��"�O��ӬZ8�=�c��X�%���S�$��HAV T#��v��P��y��&�L.�Ln~r�U����� ��m��c9�m:�_2b�S?N[2L2}�dC����zo�4@��f�[�X�LsOޱrK�u��;]���{\X������~�F��U�̃      �     x���Kw�F�ף_�*��T?��9��8���:�hh�c����)Ҍ2�FKN����֭��t���L�l�Lr���7�iS�E A�dy>�}� ������՗o�\"t��� �aĈO��Ǘ�ݽ�UJ�Iq��.��	 ��i�`]�|ШL=! b�QQeYw]�����<�
"�� G��d2z�:�(�~] V�И,{����Pa�¶B]eZڱ�4�|��������/H����6V�'c�a����N��y�� ���U�jʅ�X�5� >�̢Q���`�}D��	w~��|��v��R�{{����oo��\�[:��d�[��,����QL,�a�δ+"B� �Q�u6�Q�6�bi�E�X����/ĶەM7��ܙLl_F�%�n�"�}���}�����$:+-������v��n�*|�Un+�U� �kOO][.< �p_tlr�ᱳ+]��p�y�z���*$��U�X�f˓3'��AD�G�8�:���:�*9�"�%dϦ�hc;SV�tښ"qٰ9��n�������%P�9ET��#T��SNA�A��(ʦ�i�������5�'֎5[TN���a��������Ȑg�v�)��A�+�t��>f���Ê�H�+ַ�������E۝���(׫|M�di�W���?��UӚ�y�ʵ��Q�/�w{� us�S8��4�s:o�DK�]�T�sb�!���q�~�c/�B'�-W� �]�-�;-��Q�vV�Fp���q�0�0�w'b���,X��ށ&M9��+��u8���{����M��I�c=[~�^�A&%Me{�/[R؇z�o���Ǎ;g,� ���l��f�.�{E�L����m�Դ�WMjWY��+u�9�����,|�ĳ�gz��F]F=t�}�at�򱳍�le)/h�����bm�]��I��E��L�d�Bİ�0{Է�V�A�[�֠�)�X'�O�SH��*�$�S�K�"P����چ����qq���      �   ,  x�}��n�0Fgx�� ���ؘ-C�*���e)&�mpH�����j��G�V]���� Pw\�\2��s��>[�<x27\9��KkD�z2r�����9z~߾FH�	dE���#��؛���@�kY���X����5 \�w��H��^[δE�\Bͭ(�4�~���}��|�`��x�P<z'5\K����qu3�J(�}���� Pbim]��0�w�Y���'��L������@Ba�`� 4��ךٮ7oV���Z:;�ם���m��qV�7m̟u�$��7i^0�R&C��q�g      �   �  x���K�� �5u��@U$/1'�R�P�Gi����'fzv%�>2�'ug�B��@c��W��|WH ����6 �6���m�f�z�p��
I�qF�}����5��i���{�<hc�W���>�� ZQ�xP��
���]��	��� ��K.~�&�/C�C�<�Fpֺ�f� z�"���b�W���2:�6�󠍠��9Ң�<�;jJ�v<rx"h�:���GO�c�ɪܷ�o�Z�-�%ƚ-'�JWǎ�܏�&�8;<�� �C�A
W ��O��'XD�T-���#6'�2��UZ9�?��{`Q%���l,�[�������� `4.�K��,�YF��;��w�>e,t��K6��l�y��O��y8���Kڢ�,���2Ν���9nR$��e�W~��_.���%�      �     x�uһ��0�?�_�̮. Qf�tI���wqX`<}$�$������_Y����
	 Qc��ms>���˶vY �3�!�^�6� G�8L ���
qB!A"	޾��uC�% �5�-Yk��]㳶��2�Y[�u:��ˢ����I �(�DLco|S�Nu�9��j�UCU%@jSV��ޗ��z/�r]s 1�̴q��M�G����7 W`	�E��{o�jT�ē\ ��_Utv�^cmr:���g��o��H���%�		%!!�D��nh���2��n0m�JYOj쭞]Y�d���r��r{�]�Խ�bOVܭA��o�^�m�'���O~��cu��5� �X�&3[ϰ�ᣪ �"�U�e��HoF�_�S�Ua �Ӫ�X���Q��v��@����uH)˜F��81����H�Q������j�U픱���Ѹ����7O���ϙV�ũ{���|JSt������ �<J�������Ut�Tiu�^������|�'��y>�0�����a";��Luy/��/H�      �   �  x���Ɏ�6E������$������������'j��f����t#p� Zh���[�V�M�g2� �+�<��2�*�Z�Ɏ���� oZ��x# ���~RS�4Z�G��3�!ДA���<���)o:�s�+W�V��� �D����_բ۫��"�c�V��	|Q<�����/J�Z��w�!����Ht%e��c�DՑ�t��LW5ݳ���r~��]n�q�$�:�j>�m�̅��h<%(�"_9�f4 ���z8bLџ+j��ҍ!v�V��GT̀$�H�H!�O.$+>J��Tp��V� �gC\)������E���ޛ��le}�Y�IJ�=�)���yn2����Tj^�a�o��)����َ��.1��t{9�woq���7Z/Y�)�N�E�u�Tk:yU!����,_�Լ�H�kv\�n.ztuAD����0���*�g��n�M:�0mj9��2�[�m���6Ζ�c��fT[w"!�S
)������!����'��ԫ���d�%�P�t,7��?H.j�O�(�ר�q��f��YP�d���cA?�/M3�� ';|?���Ik�O���ySWe�f�=�0���M��1���$e$���Ӱv`�g�I����-6��vFn)��R�u��}�h��m@<eI��uc{Qfþ�������g9���%�ݶ���q����,j�$���:(�ϲ��$�s?�jg�N}�y�S_��	w��X
8�z��*>t�;E�F�ܞ��?�܆�g̭ۙ��N5��C��n�$%q�I|'�k�"P4�ā��]r�Z�.���6n`�v* ���bb[EnGߑ����͸��S�ܨjOJ���e΂ח_^�r�Gs�.�pp���^U_۱Fŗ���?2귛���D�����*��Ŧ+�6Ⱦ4�
��� ��c������֢      �      x������ � �      �   7  x���ˎ�@�����h����ͦ���Eq+��d�}�0[�$>��qN�e��O [S�Nuf(���%a �)�� d���'��DTD��� �>?����/��w��t�� �"�Y oz�'����O��|��6�~O�Hpf�1���Z��v�ʓct8^�Ŏ¢9�δi��*k�?�!o�>.�b)�������㟻�tr'���j��0��;	���I����&�XP��`�?/�W��X�*C	V�p�9c�2^�J�[��-�n���#ej�@���j�-��6 \:2���ж�����r]��.��")�\vBT�a��d圷��{]�բ&KW*�bj!�dbRe�.j��ݥ�_T=' єm-��"< ��[��?Y<ЋŘ�v���`h6�t��"�Ҿi��B1�� ��B�K��n% F�E�=�JC�������	���B��9$�E=���_�K�(rCGZ�A�ޢ�j�H��ʿ-zS#��rK��}-+�%��s�b�4�t鶋�?D���E=���t��vI�f�۱��F�{]��������d�      �   y  x�}�ێ�����b^`���U{Q���>���1>�v�ı����x'Vf0���?E��>��$`�a�t��}<����حj� �s+��̞vJ1�bǀ��`����KH�>W��������_��n�*R5��
�tJ��j5!��nE1c^�Z�짪`W�S�{��Z�v���1�;��Ї��/�H.�e������) ������"{/Ӧ ]6�ɠ���ن�a���y&��wf�ɦ�<��ʲI'��~����5W(�@�n%�z,��;k� ��y�/�{d��j�s����@�~|)9\�=�Ye0��#��oL��'��?�t#����l��p蹸l��a����=�{f>b��2�tڪlrq�c��\��jz��{�)�>��{.�M`�x{��:#)�nΕ)���fs��x�9#'�ΕfJ ��@`%R��="U_���Z���I�zs�>9�x���lCUk�B�jBߨ>�:����E��Lj�^��t�vnE]n�V
�btv>��C�@�6˴K&w�X�>��duj*��.�t���!��n^q���ܭ�iZE�vZif�a�7�mUpw��D����?dct��e���yc:�!+�}�j��Y�_-�.��D�ܩ�
�[�U�5�O�LP�����U#>��@�*^�0�)ߨ(j�����/p]l�1��'�'�B�!.��Y��2>����,d0����=���}�.�˪�V����>� 6d��E�GC-$����Ymʈ�)*~��B7%�&�N��$����L_��F;�C�2O=���4>������"�ĩ�I�Γ���F�j�NMX�����½�&YM=��ʦ:�����hQ�j��6+�棕��q���f�2���T��Z�ˍ��Fp�P�uzF-�Br�s��j5�l[���4���R�\��#���&M�[;Nq?p��5kW8�)�b�+�J�W��p�
�$|��"����gM����I4t�Y���l�A[��~c��U
��q?�'��jh���l��l���'�:lP��2������|`�Ğ����tTN�5�I6��k!�寎���#"�V>W_g�a��M�j_��~;�Uȭo��k�Z��8_Vf�!S��:W��-�{�m��B�rV�)�n�\�]s��N��p�"��g�{t���,����E7f*�x�.َm�^5���]O܍6RK�����W�{i�e�T�a�,o`7���+�
��*����0�le}~W���>��S��d����6�KVR;5����K,��Ჱ}@J�W��y����In����BB���m�7�P��Ε<��K�Lvj�s��V.��H�e��;7�^<�=n�[<8%���~/L`�V�$Å��^�`S��-lĆ+ i~P��%��.>]yr/�4�Iz��qQ�F̍-��^���­LԆ��oh���0��b�)�hPJ����懰r������<l�J���z|�w�p�jIq�gn�av�Y6\,M������V�+��+�4��\ȃ����ꉽ��=K��㑑gP�U��ϓ��Ƅ[��Lk)�������(�M�F˹����ǿT�m��
e�T���	���^ˬ��������W��|i�R�L3ps1��4*�s�G�"zw��1#�:W���$����WdZQuLsT�c{骂����-+=n�<P� 8�8]�O�j�d;9z0L��=�}��iC�2e퇪r�A����)@ƛ�����WcZęf����a^�v'��]�z�����|CG�K[@�څ��rR�x��P��[Q�;aQ���v����}�O�~������ݕ�d�4�fG�4Yn���o|�aBh��f�N:�o���f�^��0N�;@�N�;L�.C�!�%Sl-;qAh�a�0싦}�ГK'��)�ȸ��2��΋�k�#��NI�����NZ�Ô���ׇ]�<�4A�S1씘N�L2n_{r�8w�<�0��V\�a��}�p-���z�6�|C������KwI����*~�E���5I��	�v8�E��qv�����Lm�#�o3(&�H%�
i�+��8�5'�
}G��	����&�o���U��:�7�e����d!�O@rx��^����<=���gݟ��_���e&�      �   �   x�%�;� �ZV�t.<a-�D��Q�_V��ԧ8n�[�ɷ�ZBRU�B�x����Ѐ |CҦ}��i����� T.$u����	*`
!rN�JU��07N�+�����s�q��!{�;��q���=����r��y�a��l���9�Jm�)���U2�~$�>�      �      x������ � �      �      x������ � �      }     x�m��n� ���z1��U�e��Qib��q0��ak��Ä�yh� � $��Cpn�c�~v���P���>��x&jO,��w�\i�݈7ߟ\���y��gH+��H��8%�4�������,��?ko���m��^N�Phe�}ӞbZQt��������vu�����FL���s1�'�o<e�@��ߠ�9�]�SZu�B�Z+-L���Shu�txR�6HsL;�_���t�4��ȅ�y��Aq�گ��mo�O      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �      �      x������ � �         �  x���K��0F�ί`1RWu�����=@ 	)�$���Md�����cQe��l0F�|��s-�$C��LBT���% �a��
��W<���"?^�Ѣ�^�R#��5(��*�[���ջ������z=����Ӟ1�n����ݼ:�k�0@����\[��� ����8r�&f���;�e����qV�CF=Rv	�7��	I�����;���<��yd�D�+��A7�7�׊��WG楃�iDf�x9���d�}<�[}U`�;�,^�����n΋�]��2:�j�0\�ͺ��	��g}���M��J!O��	V�r�F!�5�f_��c�!�`�$�;��,�rUV{_���H��MV��`t�8xN���e����&�����s�s�N�y�E�
��,�$&�qyn��4\���p�Ygv	J�@ҏJ��0DC"2���֫���?[{��N�E;��	(�C$�U�`q��)���_t����>���`vگ��еF|A����Ө��<��aJk�N��@��v�:�SR$�r�,Ơ�1�P���xQ�����"��X�	�$l*#�A�bc�X�K�*6�ԟ�l����E݈1�$HA����X)toH�rf�0[Ҫ`#x%3F",�g\�J�xs��_8+Lm�W�y�Z����L���,�D����֏�N���w���-t�HC'-�H8�!�o����R�G����*
�1��N��zF�#     