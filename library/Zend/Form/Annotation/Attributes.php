<?php
/**
 * Zend Framework
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://framework.zend.com/license/new-bsd
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to license@zend.com so we can send you a copy immediately.
 *
 * @category   Zend
 * @package    Zend_Form
 * @subpackage Annotation
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */

namespace Zend\Form\Annotation;

use Zend\Form\Exception;

/**
 * Attributes annotation
 *
 * Expects a JSON-encoded object/associative array as the content. The value is
 * used to set any attributes on the related form object (element, fieldset, or 
 * form).
 *
 * @category   Zend
 * @package    Zend_Form
 * @subpackage Annotation
 * @copyright  Copyright (c) 2005-2012 Zend Technologies USA Inc. (http://www.zend.com)
 * @license    http://framework.zend.com/license/new-bsd     New BSD License
 */
class Attributes extends AbstractAnnotation
{
    /**
     * @var array
     */
    protected $attributes;

    /**
     * Receive and process the contents of an annotation
     * 
     * @param  string $content 
     * @return void
     */
    public function initialize($content)
    {
        $attributes = $this->parseJsonContent($content, __METHOD__);
        if (!is_array($attributes)) {
            throw new Exception\DomainException(sprintf(
                '%s expects the annotation to define a JSON object or array; received "%s"',
                __METHOD__,
                gettype($attributes)
            ));
        }
        $this->attributes = $attributes;
    }

    /**
     * Retrieve the attributes
     * 
     * @return null|array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }
}
