<?php
/**
 * First we easily find the nodes with no predecessors.
 * Then, using a queue, we can keep the nodes with no predecessors and on each dequeue we can remove the edges from the node to all other nodes.

 * Pseudo Code
 *  1. Represent the graph with two lists on each vertex (incoming edges and outgoing edges)
 *  2. Make an empty queue Q;
 *  3. Make an empty topologically sorted list T;
 *  4. Push all items with no predecessors in Q;
 *  5. While Q is not empty
 *     a. Dequeue from Q into u;
 *     b. Push u in T;
 *     c. Remove all outgoing edges from u;
 *  6. Return T;
 *
 http://www.stoimen.com/blog/2012/12/10/computer-algorithms-topological-sort-revisited/
 */