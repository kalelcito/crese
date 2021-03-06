<?php
namespace CoreBundle\Entity;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * @ORM\Entity
 */
class Niveles
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer", length=5)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $nombre;

    /**
     * @ORM\Column(type="decimal", length=12, nullable=true, precision=12, scale=2, options={"default":0})
     */
    private $precio_mensual;

    /**
     * @ORM\Column(type="decimal", length=12, nullable=true, precision=12, scale=2, options={"default":0})
     */
    private $precio_anual;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $moneda;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $moneda_str;

    /**
     * @ORM\Column(type="boolean", nullable=true, options={"default":1})
     */
    private $activo;

    /**
     * @ORM\Column(type="string", length=5000, nullable=true)
     */
    private $permisos;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="create", field="created_at")
     */
    private $created_at;

    /**
     * @ORM\Column(type="datetime", nullable=false)
     * @Gedmo\Timestampable(on="update", field="updated_at")
     */
    private $updated_at;

    /**
     * @ORM\OneToMany(targetEntity="CoreBundle\Entity\Clientes", mappedBy="niveles")
     */
    private $clientes;

    /**
     * @ORM\ManyToMany(targetEntity="CoreBundle\Entity\Seccion_Contenidos", mappedBy="niveles")
     */
    private $seccionContenidos;
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->clientes = new \Doctrine\Common\Collections\ArrayCollection();
        $this->seccionContenidos = new \Doctrine\Common\Collections\ArrayCollection();
    }
    public function __toString()
    {
        return $this->nombre." - $".$this->getPrecioMensual()."MXN por mes (Pago Anual)";
    }

    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Niveles
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set precioMensual
     *
     * @param string $precioMensual
     *
     * @return Niveles
     */
    public function setPrecioMensual($precioMensual)
    {
        $this->precio_mensual = $precioMensual;

        return $this;
    }

    /**
     * Get precioMensual
     *
     * @return string
     */
    public function getPrecioMensual()
    {
        return $this->precio_mensual;
    }

    /**
     * Set precioAnual
     *
     * @param string $precioAnual
     *
     * @return Niveles
     */
    public function setPrecioAnual($precioAnual)
    {
        $this->precio_anual = $precioAnual;

        return $this;
    }

    /**
     * Get precioAnual
     *
     * @return string
     */
    public function getPrecioAnual()
    {
        return $this->precio_anual;
    }

    /**
     * Set moneda
     *
     * @param string $moneda
     *
     * @return Niveles
     */
    public function setMoneda($moneda)
    {
        $this->moneda = $moneda;

        return $this;
    }

    /**
     * Get moneda
     *
     * @return string
     */
    public function getMoneda()
    {
        return $this->moneda;
    }

    /**
     * Set monedaStr
     *
     * @param string $monedaStr
     *
     * @return Niveles
     */
    public function setMonedaStr($monedaStr)
    {
        $this->moneda_str = $monedaStr;

        return $this;
    }

    /**
     * Get monedaStr
     *
     * @return string
     */
    public function getMonedaStr()
    {
        return $this->moneda_str;
    }

    /**
     * Set activo
     *
     * @param boolean $activo
     *
     * @return Niveles
     */
    public function setActivo($activo)
    {
        $this->activo = $activo;

        return $this;
    }

    /**
     * Get activo
     *
     * @return boolean
     */
    public function getActivo()
    {
        return $this->activo;
    }

    /**
     * Set permisos
     *
     * @param string $permisos
     *
     * @return Niveles
     */
    public function setPermisos($permisos)
    {
        $this->permisos = $permisos;

        return $this;
    }

    /**
     * Get permisos
     *
     * @return string
     */
    public function getPermisos()
    {
        return $this->permisos;
    }

    /**
     * Add cliente
     *
     * @param \CoreBundle\Entity\Clientes $cliente
     *
     * @return Niveles
     */
    public function addCliente(\CoreBundle\Entity\Clientes $cliente)
    {
        $this->clientes[] = $cliente;

        return $this;
    }

    /**
     * Remove cliente
     *
     * @param \CoreBundle\Entity\Clientes $cliente
     */
    public function removeCliente(\CoreBundle\Entity\Clientes $cliente)
    {
        $this->clientes->removeElement($cliente);
    }

    /**
     * Get clientes
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClientes()
    {
        return $this->clientes;
    }

    /**
     * Add seccionContenido
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $seccionContenido
     *
     * @return Niveles
     */
    public function addSeccionContenido(\CoreBundle\Entity\Seccion_Contenidos $seccionContenido)
    {
        $this->seccionContenidos[] = $seccionContenido;

        return $this;
    }

    /**
     * Remove seccionContenido
     *
     * @param \CoreBundle\Entity\Seccion_Contenidos $seccionContenido
     */
    public function removeSeccionContenido(\CoreBundle\Entity\Seccion_Contenidos $seccionContenido)
    {
        $this->seccionContenidos->removeElement($seccionContenido);
    }

    /**
     * Get seccionContenidos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSeccionContenidos()
    {
        return $this->seccionContenidos;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     *
     * @return Niveles
     */
    public function setCreatedAt($createdAt)
    {
        $this->created_at = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     *
     * @return Niveles
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updated_at = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }
}
