<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet xmlns:xsl="http://www.w3.org/1999/XSL/Transform" version="1.0"> 
     <xsl:param name="username"/>
    <xsl:param name="pos"/>

    <xsl:output method="html"/>
    <xsl:template match="/">    
                     <xsl:for-each select="accounts/account">
                            <tr>
                                <td>
                                    <img src="{image}" width="100px" height="100px"/>
                                </td>
                                 <td><xsl:value-of select="username"/></td>
                                 <td><xsl:value-of select="email"/></td>
                                 <td><xsl:value-of select="password"/></td>
                                <td> 
                                <xsl:element name="a">
                                <xsl:attribute name="href">
                                    <xsl:value-of select="edit"/>
                                </xsl:attribute>
                                <span>Edit    </span>
                                </xsl:element>

                                <xsl:element name="a">
                                <xsl:attribute name="href">
                                    <xsl:value-of select="delete"/>
                                </xsl:attribute>

                                <xsl:attribute name="onclick">
                                    <xsl:value-of select="confirm"/>
                                </xsl:attribute>
                                <span>Delete   </span>
                                </xsl:element>
                            </td>
                            </tr>
                     </xsl:for-each>
    </xsl:template>
</xsl:stylesheet>