<?php

namespace Application\Bundle\MotoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Application\Bundle\MotoBundle\Entity\Vehicule
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="Application\Bundle\MotoBundle\Entity\VehiculeRepository")
 */
class Vehicule
{
    /**
     * @var integer $id
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string $nom_proprietaire
     *
     * @ORM\Column(name="nom_proprietaire", type="string", length=255)
     */
    private $nom_proprietaire;

    /**
     * @var string $prenom_proprietaire
     *
     * @ORM\Column(name="prenom_proprietaire", type="string", length=255)
     */
    private $prenom_proprietaire;

    /**
     * @var string $nom_vehicule
     *
     * @ORM\Column(name="nom_vehicule", type="string", length=255)
     */
    private $nom_vehicule;

	    /**
	     * @ORM\ManyToMany(targetEntity="Piece")
	     * @ORM\JoinTable(name="vehicule_piece",
	     *     joinColumns={@ORM\JoinColumn(name="vehicule_id", referencedColumnName="id")},
	     *     inverseJoinColumns={@ORM\JoinColumn(name="piece_id", referencedColumnName="id")}
	     * )
	     *
	     * @var ArrayCollection $piece
	     */
	    protected $piece;

	    /**
	     * @ORM\ManyToOne(targetEntity="Categorie")
	     * @ORM\JoinColumn(name="categorie_id", referencedColumnName="id")
	     *
	     * @var Categorie $categorie
	     */
	    protected $categorie;

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
     * Set nom_proprietaire
     *
     * @param string $nomProprietaire
     */
    public function setNomProprietaire($nomProprietaire)
    {
        $this->nom_proprietaire = $nomProprietaire;
    }

    /**
     * Get nom_proprietaire
     *
     * @return string 
     */
    public function getNomProprietaire()
    {
        return $this->nom_proprietaire;
    }

    /**
     * Set prenom_proprietaire
     *
     * @param string $prenomProprietaire
     */
    public function setPrenomProprietaire($prenomProprietaire)
    {
        $this->prenom_proprietaire = $prenomProprietaire;
    }

    /**
     * Get prenom_proprietaire
     *
     * @return string 
     */
    public function getPrenomProprietaire()
    {
        return $this->prenom_proprietaire;
    }

    /**
     * Set nom_vehicule
     *
     * @param string $nomVehicule
     */
    public function setNomVehicule($nomVehicule)
    {
        $this->nom_vehicule = $nomVehicule;
    }

    /**
     * Get nom_vehicule
     *
     * @return string 
     */
    public function getNomVehicule()
    {
        return $this->nom_vehicule;
    }
    public function __construct()
    {
        $this->piece = new \Doctrine\Common\Collections\ArrayCollection();
    }
    
    /**
     * Add piece
     *
     * @param Application\Bundle\MotoBundle\Entity\Piece $piece
     */
    public function addPiece(\Application\Bundle\MotoBundle\Entity\Piece $piece)
    {
        $this->piece[] = $piece;
    }

    /**
     * Get piece
     *
     * @return Doctrine\Common\Collections\Collection 
     */
    public function getPiece()
    {
        return $this->piece;
    }

    /**
     * Set categorie
     *
     * @param Application\Bundle\MotoBundle\Entity\Categorie $categorie
     */
    public function setCategorie(\Application\Bundle\MotoBundle\Entity\Categorie $categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * Get categorie
     *
     * @return Application\Bundle\MotoBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }
	
	 public function __toString()
    {
	    return $this->nom_vehicule;
	}
}