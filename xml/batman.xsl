<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0">
    <xsl:template match="/">
        <html>
            <head>
                <title>Simbol Batman</title>
            </head>
            <body>
                <h1>Simbol Batman</h1>
                <svg width="400" height="400">
                    <xsl:copy-of select="svg/*"/>
                </svg>
            </body>
        </html>
    </xsl:template>
</xsl:stylesheet>