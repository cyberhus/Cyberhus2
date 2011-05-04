<?php
// $Id: faq-questions-inline.tpl.php,v 1.1.2.6 2008/04/16 16:14:45 snpower Exp $

/**
 * Available variables:
 *
 * $nodes
 *   The array of nodes to be displayed.
 *   Each node stored in the $nodes array has the following information:
 *     $node['question'] is the question text.
 *     $node['body'] is the answer text.
 *     $node['links'] represents the node links, e.g. "Read more".
 * $question_label
 *   The question label, intended to be pre-pended to the question text.
 * $answer_label
 *   The answer label, intended to be pre-pended to the answer text.
 * $use_teaser
 *   Tells whether $node['body'] contains the full body or just the teaser
 */
?><div>
<?php foreach ($nodes as $node): ?>
  <?php // Cycle through the $nodes array so that we now have a $node variable to work with. ?>
  <br />
  <div class="faq_question">
  <strong>
  <?php print $question_label; ?>
  </strong>
  <?php print $node['question']; ?>
  </div> <!-- Close div: faq_question -->

  <div class="faq_answer">
  <strong>
  <?php print $answer_label; ?>
  </strong>
  <?php print $node['body']; ?>
  <?php print $node['links']; ?>
  </div> <!-- Close div: faq_answer -->
<?php endforeach; ?>
</div> <!-- Close div -->
