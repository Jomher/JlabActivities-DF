USE [phpruebas]
GO
/****** Object:  Table [dbo].[Agenda]    Script Date: 12/02/2020 06:43:25 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Agenda](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[cliente] [varchar](18) NULL,
	[fecha] [datetime] NULL,
	[observacion] [varchar](max) NULL,
	[direccion] [varchar](max) NULL,
	[final] [datetime] NULL,
	[fechaAnterior] [datetime] NULL,
	[tipoEvento] [char](8) NULL,
	[finalizado] [bit] NULL,
	[archivo] [image] NULL,
 CONSTRAINT [PK_Agenda] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[archivos]    Script Date: 12/02/2020 06:43:25 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[archivos](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[nombre] [varchar](200) NULL,
	[descripcion] [varchar](200) NULL,
	[ruta] [varchar](200) NULL,
	[tipo] [varchar](200) NULL,
	[size] [int] NULL,
	[idAgenda] [int] NULL,
 CONSTRAINT [PK__archivos__3213E83F5A20C744] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Clientes]    Script Date: 12/02/2020 06:43:25 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Clientes](
	[Cliente] [varchar](24) NOT NULL,
	[nombrecli] [varchar](300) NULL CONSTRAINT [DF__clientes__nombre__2B3F6F97]  DEFAULT (NULL),
	[direcli] [varchar](300) NULL CONSTRAINT [DF__clientes__direcl__2C3393D0]  DEFAULT (NULL),
	[telecli] [varchar](45) NULL CONSTRAINT [DF__clientes__telecl__2D27B809]  DEFAULT (NULL),
	[nit] [varchar](45) NULL CONSTRAINT [DF__clientes__nit__2E1BDC42]  DEFAULT (NULL),
	[nrc] [varchar](45) NULL CONSTRAINT [DF__clientes__nrc__2F10007B]  DEFAULT (NULL),
	[tipocontri] [int] NULL CONSTRAINT [DF__clientes__tipoco__300424B4]  DEFAULT (NULL),
	[email] [varchar](100) NULL CONSTRAINT [DF__clientes__email__30F848ED]  DEFAULT (NULL),
	[doc_id] [varchar](20) NULL CONSTRAINT [DF__clientes__doc_id__31EC6D26]  DEFAULT (NULL),
	[dias_plazo] [int] NULL CONSTRAINT [DF__clientes__dias_p__32E0915F]  DEFAULT (NULL),
	[retiene] [bit] NULL CONSTRAINT [DF__clientes__retien__33D4B598]  DEFAULT (NULL),
	[exento] [bit] NULL CONSTRAINT [DF__clientes__exento__34C8D9D1]  DEFAULT ((0)),
	[TelCel] [varchar](80) NULL,
	[FecNac] [datetime] NULL,
	[TipoCliente] [varchar](12) NULL,
	[EsProspecto] [bit] NULL,
	[nomcomercial] [nvarchar](300) NULL,
	[nofax] [nvarchar](15) NULL,
	[tasacero] [smallint] NULL,
	[tipopersona] [varchar](12) NULL,
	[calificacion] [varchar](12) NULL,
	[departamento] [varchar](100) NULL,
	[municipio] [varchar](12) NULL,
	[vendedor] [varchar](12) NULL,
	[cobrador] [varchar](12) NULL,
	[zona] [varchar](12) NULL,
	[incobrable] [smallint] NULL,
	[cuentacontable] [varchar](18) NULL,
	[limitecredito] [float] NULL,
	[estadocredito] [int] NULL,
	[aceptacheque] [smallint] NULL,
	[diapago] [int] NULL,
	[diarecibefact] [int] NULL,
	[garantia] [varchar](50) NULL,
	[tablaprecio] [varchar](12) NULL,
	[observacion] [varchar](max) NULL,
	[giro] [varchar](300) NULL,
	[idcliente] [int] IDENTITY(1,1) NOT NULL,
	[codpais] [varchar](12) NULL,
	[codsucursal] [varchar](12) NULL,
	[diasgracia] [int] NULL,
	[semigro] [bit] NULL,
	[Ruta] [varchar](12) NULL,
	[competidor] [bit] NULL,
	[ultimopago] [datetime] NULL,
	[valor_ult] [float] NULL,
	[concepto] [varchar](12) NULL,
	[numero] [varchar](12) NULL,
	[RLnit] [varchar](40) NULL,
	[RLDoc] [varchar](40) NULL,
	[RLnombre] [varchar](300) NULL,
	[RLdireccion] [varchar](300) NULL,
	[cuentaAnticipos] [varchar](20) NULL,
	[Pais] [varchar](50) NULL,
	[In_pap] [bit] NULL,
	[inpap] [bit] NULL,
	[Descuento] [float] NULL,
	[SaldoAdmon] [float] NULL,
	[Contacto] [varchar](800) NULL,
 CONSTRAINT [PK_clientes_Cliente] PRIMARY KEY CLUSTERED 
(
	[Cliente] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY] TEXTIMAGE_ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Configuracion]    Script Date: 12/02/2020 06:43:25 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Configuracion](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[idempresa] [int] NULL,
	[color_inicial] [varchar](50) NULL,
	[color_final] [varchar](50) NULL,
PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[Departamentos]    Script Date: 12/02/2020 06:43:25 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[Departamentos](
	[IdDepart] [int] NOT NULL,
	[CodigoDepart] [varchar](20) NULL,
	[NombreDepart] [varchar](50) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[tipoEvento]    Script Date: 12/02/2020 06:43:25 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[tipoEvento](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[tipoEvento] [varchar](12) NULL,
	[descripcion] [varchar](500) NULL,
	[color] [varchar](50) NULL,
	[finaliza] [bit] NULL,
 CONSTRAINT [PK_tipoEvento] PRIMARY KEY CLUSTERED 
(
	[id] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
/****** Object:  Table [dbo].[usuarios]    Script Date: 12/02/2020 06:43:25 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[usuarios](
	[id] [int] IDENTITY(1,1) NOT NULL,
	[usuario] [varchar](50) NULL,
	[nombreusuario] [varchar](500) NULL,
	[Contraseña] [varchar](300) NULL,
	[codperfil] [varchar](50) NULL,
	[claveweb] [varchar](50) NULL
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
