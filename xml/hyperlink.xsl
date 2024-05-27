<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Melodie surpriza</title>
            </head>
            <body>
                <h1>Melodie surpriza</h1>
                <p>
                    Ascultă melodia pe YouTube: 
                    <a href="{song/link}">
                        <xsl:value-of select="song/title"/>
                    </a>
                </p>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>
