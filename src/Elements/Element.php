<?php


namespace PHTML\Elements;


abstract class Element implements \PHTML\Elements\Contracts\Element
{
    /**
     * Element InnerHtml.
     *
     * @var string
     */
    protected string $innerHtml = '';

    /**
     * Element Attributes.
     *
     * @var array
     */
    protected array $attributes = [];

    /**
     * Element constructor.
     *
     * @param string $text
     */
    public function __construct($text = '')
    {
        $this->innerHtml = $text;
    }

    /**
     * make new Element.
     *
     * @param string $text
     * @return Element
     */
    public function make($text = '')
    {
        return new static($text);
    }

    /**
     * Render Element To HTML Format.
     *
     * @return string
     */
    abstract public function render(): string;

    /**
     * Add Component State.
     *
     * @param $value
     * @return $this
     */
    public function state($value): self
    {
        $this->addAttribute('x-data', $value);

        return $this;
    }

    /**
     * Add @click event to the Element.
     *
     * @param $value
     * @return $this
     */
    public function onClick($value): self
    {
        $this->addEvent("click", $value);

        return $this;
    }

    /**
     * Add Show Condition Attribute to the Element.
     *
     * @param $value
     * @return $this
     */
    public function showWhen($value): self
    {
        $this->addAttribute("x-show", $value);

        return $this;
    }

    /**
     * Add Event Listener to the Element.
     *
     * @param string $event
     * @param $value
     * @return $this
     */
    public function addEvent(string $event, $value): self
    {
        $this->addAttribute("@$event", $value);

        return $this;
    }

    /**
     * Add Attribute to Element.
     *
     * @param string $name
     * @param $value
     * @return $this
     */
    public function addAttribute(string $name, $value): self
    {
        if (is_array($value)) {
            $value = str_replace('"', '', json_encode($value));
        }

        $this->attributes[$name] = $value;

        return $this;
    }

    /**
     * Set InnerHtml of The Element.
     *
     * @param $html
     * @return $this
     */
    public function innerHtml($html): self
    {
        if (is_array($html)) {
            foreach ($html as $element) {
                $this->appendChild($element);
            }
            return $this;
        }

        if ($html instanceof Element) {
            $html = $html->render();
        }

        $this->innerHtml = $html;

        return $this;
    }

    /**
     * Append Child to The Element.
     *
     * @param $element
     * @return $this
     */
    public function appendChild($element)
    {
        if ($element instanceof Element) {
            $element = $element->render();
        }

        $this->innerHtml .= $element;

        return $this;
    }

    /**
     * Get Stringified Version of The Attributes.
     *
     * @return string
     */
    public function getAttributesString(): string
    {
        $attributes = '';

        foreach ($this->attributes as $key => $attribute) {
            $attributes .= "$key='$attribute' ";
        }

        return trim($attributes);
    }
}