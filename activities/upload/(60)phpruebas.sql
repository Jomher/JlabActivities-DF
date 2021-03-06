USE [phpruebas]
GO
/****** Object:  Table [dbo].[cat_deptosg]    Script Date: 12/02/2020 07:36:05 p.m. ******/
SET ANSI_NULLS ON
GO
SET QUOTED_IDENTIFIER ON
GO
SET ANSI_PADDING ON
GO
CREATE TABLE [dbo].[cat_deptosg](
	[codigo_depto] [varchar](12) NOT NULL,
	[nombre_depto] [varchar](35) NULL,
	[codempre] [tinyint] NULL,
	[id_deptoGeo] [int] IDENTITY(1,1) NOT NULL,
 CONSTRAINT [PK_cat_deptosg] PRIMARY KEY CLUSTERED 
(
	[codigo_depto] ASC
)WITH (PAD_INDEX = OFF, STATISTICS_NORECOMPUTE = OFF, IGNORE_DUP_KEY = OFF, ALLOW_ROW_LOCKS = ON, ALLOW_PAGE_LOCKS = ON) ON [PRIMARY]
) ON [PRIMARY]

GO
SET ANSI_PADDING OFF
GO
SET IDENTITY_INSERT [dbo].[cat_deptosg] ON 

INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'01', N'AHUACHAPAN', 1, 17)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'02', N'SANTA ANA', 1, 18)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'03', N'SONSONATE', 1, 19)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'04', N'CHALATENANGO', 1, 20)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'05', N'LA LIBERTAD', 1, 21)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'06', N'SAN SALVADOR', 1, 22)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'07', N'CUSCATLAN', 1, 23)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'08', N'LA PAZ', 1, 24)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'09', N'CABAÑAS', 1, 25)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'10', N'SAN VICENTE', 1, 26)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'11', N'USULUTAN', 1, 27)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'12', N'SAN MIGUEL', 1, 28)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'13', N'MORAZAN', 1, 29)
INSERT [dbo].[cat_deptosg] ([codigo_depto], [nombre_depto], [codempre], [id_deptoGeo]) VALUES (N'14', N'LA UNION', 1, 30)
SET IDENTITY_INSERT [dbo].[cat_deptosg] OFF
