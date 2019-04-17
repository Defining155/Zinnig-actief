<?php

namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ReservationRepository")
 */
class Reservation
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Entity\Event", mappedBy="User")
     */
    private $Event_id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Location;

    public function __construct()
    {
        $this->Event_id = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection|Event[]
     */
    public function getEventId(): Collection
    {
        return $this->Event_id;
    }

    public function addEventId(Event $eventId): self
    {
        if (!$this->Event_id->contains($eventId)) {
            $this->Event_id[] = $eventId;
            $eventId->setUser($this);
        }

        return $this;
    }

    public function removeEventId(Event $eventId): self
    {
        if ($this->Event_id->contains($eventId)) {
            $this->Event_id->removeElement($eventId);
            // set the owning side to null (unless already changed)
            if ($eventId->getUser() === $this) {
                $eventId->setUser(null);
            }
        }

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->Location;
    }

    public function setLocation(string $Location): self
    {
        $this->Location = $Location;

        return $this;
    }
}
