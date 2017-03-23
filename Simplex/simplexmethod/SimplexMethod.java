/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package simplexmethod;

import java.awt.*;
import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import javax.swing.*;
import javax.swing.border.CompoundBorder;
import javax.swing.border.EmptyBorder;

/**
 *
 * @author Reed
 */
public class SimplexMethod extends JFrame
{
    /** Interface */
    private final Color background = new Color(0, 0, 100, 170);
    private final Font fontTitles = new Font("Arial", Font.BOLD, 16);
    
    private final PrincipalPan prp;
    private final JPanel pTitre, pNord, pcenter, pcenterLeft, pcenterRight, pcenterRightBot, pcenterRightTop, pSud;
    private final JLabel titreLab, problemLab, optionsLab, solutionLab, tabLab;
    private final JButton resoudre, effacer;
    private final JTextArea problem, tab;
    private final JTextField solutionField;
    private final JScrollPane sp, sp2;
    private final ButtonGroup radioGroup;
    private final JRadioButton maxi, mini;
    
    private boolean minOrMax = false;
    
    public SimplexMethod(String title)
    {
        super(title);
        
        prp = new PrincipalPan();
        prp.setBorder(BorderFactory.createLineBorder(Color.BLACK, 2, true));
        prp.setLayout(new GridBagLayout());
        GridBagConstraints c = new GridBagConstraints();
        
        /** Bloc de titre */
        pTitre = new JPanel();
        pTitre.setBorder(BorderFactory.createLineBorder(Color.white, 2, true));
        pTitre.setOpaque(false);
        titreLab = new JLabel("Méthode du simplexe", SwingConstants.HORIZONTAL);
        titreLab.setFont(new Font("Times New Roman", Font.BOLD, 24));
        titreLab.setForeground(Color.WHITE);
        pTitre.add(titreLab);
        
        c.gridx = 0;
        c.gridy = 0;
        c.insets = new Insets(10, 0, 10, 0);
        prp.add(pTitre, c);
        
        /** Bloc au nord */
        pNord = new JPanel();
        pNord.setBorder(BorderFactory.createLineBorder(Color.BLACK, 2, false));
        pNord.setLayout(new BorderLayout());
        problemLab = new JLabel("Entrez votre problème ici:", (int) SwingConstants.HORIZONTAL);
        problemLab.setFont(fontTitles);
        problem = new JTextArea(8, 70);
        sp = new JScrollPane(problem);
        
        pNord.add(problemLab, BorderLayout.NORTH);
        pNord.add(sp, BorderLayout.SOUTH);
        
        c.gridx = 0;
        c.gridy = 1;
        prp.add(pNord, c);
        
        
        /** Bloc au centre */
        pcenter = new JPanel();
        pcenter.setLayout(new GridBagLayout());
        GridBagConstraints ccenter = new GridBagConstraints();
        pcenter.setOpaque(false);
        //Centre gauche -------------------------------
        pcenterLeft = new JPanel();
        pcenterLeft.setLayout(new GridBagLayout());
        pcenterLeft.setBorder(BorderFactory.createLineBorder(Color.BLACK, 2, false));
        pcenterLeft.setBackground(Color.white);
        GridBagConstraints ccenterleft = new GridBagConstraints();
        radioGroup = new ButtonGroup();
        mini = new JRadioButton("Minimize");
        mini.setSelected(true);
        mini.setOpaque(false);
        maxi = new JRadioButton("Maximize");
        maxi.setOpaque(false);
        radioGroup.add(maxi);
        radioGroup.add(mini);
        optionsLab = new JLabel("Options:");
        optionsLab.setFont(fontTitles);
        ccenterleft.gridy=0;
        ccenterleft.gridwidth=2;
        ccenterleft.insets = new Insets(0, 0, 10, 0);
        pcenterLeft.add(optionsLab, ccenterleft);
        ccenterleft.insets = new Insets(0, 0, 0, 0);
        ccenterleft.gridx=1;
        ccenterleft.gridy=1;
        ccenterleft.gridwidth=1;
        pcenterLeft.add(maxi, ccenterleft);
        ccenterleft.gridx=0;
        ccenterleft.gridwidth=1;
        ccenterleft.gridy=1;
        pcenterLeft.add(mini, ccenterleft);
        //Centre droite --------------------------------
        pcenterRight = new JPanel();
        pcenterRight.setLayout(new BorderLayout());
        pcenterRight.setBorder(BorderFactory.createLineBorder(Color.BLACK, 2, false));
        pcenterRight.setBackground(Color.white);
        solutionLab = new JLabel("Solution", SwingConstants.HORIZONTAL);
        solutionLab.setFont(fontTitles);
        solutionLab.setBorder(new CompoundBorder(new EmptyBorder(2, 2, 10, 2), solutionLab.getBorder()));
        resoudre = new JButton("Résoudre");
        effacer = new JButton("Effacer");
        solutionField = new JTextField("Solution ici", 30);
        solutionField.setBorder(new CompoundBorder(new EmptyBorder(4, 4, 4, 4), solutionField.getBorder()));
        solutionField.setEditable(false);
        
        resoudre.addActionListener(new ActionListener(){
            @Override
            public void actionPerformed(ActionEvent e) {
                if(!(problem.getText().isEmpty())){
                    solutionField.setText("La solution est là!");
                    //envoie des données vers traitement
                    TraitementInformations.getList().clear();
                    TraitementInformations.setProblem(problem.getText());
                    TraitementInformations.setMinOrMax(maxi.isSelected());
                    TraitementInformations.proceed();
                    for(String s: TraitementInformations.getList()){
                        System.out.println(s);
                    }
                    TraitementInformations.extract();
                    TraitementInformations.getNbContraintes();
                }
                else{
                    JOptionPane.showMessageDialog(resoudre.getParent().getParent().getParent(), "Vous devez saisir un problème et choisir entre minimize et maximize!", "Erreur", JOptionPane.ERROR_MESSAGE);
                }
            }
            
        });
        effacer.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent e) {
                problem.setText("");
                radioGroup.clearSelection();
                solutionField.setText("Solution ici");
                tab.setText("");
            }
        }
        );
        
        pcenterRightTop = new JPanel();
        pcenterRightTop.setLayout(new BorderLayout());
        pcenterRightTop.add(solutionLab, BorderLayout.NORTH);
        pcenterRightTop.add(solutionField, BorderLayout.SOUTH);
        
        pcenterRightBot = new JPanel();
        pcenterRightBot.add(resoudre);
        pcenterRightBot.add(effacer);
        
        pcenterRight.add(pcenterRightTop, BorderLayout.NORTH);
        pcenterRight.add(pcenterRightBot, BorderLayout.SOUTH);
        
        ccenter.insets = new Insets(0,0,50,100);
        pcenter.add(pcenterLeft, ccenter);
        ccenter.insets = new Insets(0,0,20,0);
        pcenter.add(pcenterRight, ccenter);
        
        c.gridx = 0;
        c.gridy = 2;
        c.insets = new Insets(20,0,0,0);
        prp.add(pcenter,c);
        
        /** Bloc au sud */
        pSud = new JPanel();
        pSud.setBorder(BorderFactory.createLineBorder(Color.BLACK, 2, false));
        pSud.setLayout(new BorderLayout());
        tabLab = new JLabel("Tableaux:", (int) SwingConstants.HORIZONTAL);
        tabLab.setFont(fontTitles);
        tab = new JTextArea(10,70);
        tab.setEditable(false);
        sp2 = new JScrollPane(tab);
        pSud.add(tabLab, BorderLayout.NORTH);
        pSud.add(sp2, BorderLayout.SOUTH);
        c.gridx = 0;
        c.gridy = 3;
        c.insets = new Insets(0,0,0,0);
        prp.add(pSud, c);
        
        
        this.add(prp);
    }
    
    public String getProblem(){
        return problem.getText();
    }
    
    public class PrincipalPan extends JPanel
    {
        @Override
        public void paintComponent(Graphics g)
        {
            super.paintComponent(g);
            setBackground(background);
        }
    }
}
